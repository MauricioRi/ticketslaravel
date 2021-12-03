import 'dart:io';
import 'package:boletera_bt/Helpers/helper_egreso.dart';
import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Models/egreso.dart';
import 'package:boletera_bt/Models/reporteitem.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/reportes.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:dropdown_search/dropdown_search.dart';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_slidable/flutter_slidable.dart';
import 'package:image_picker/image_picker.dart';
import 'package:intl/intl.dart';

class ReporteDiario extends StatefulWidget {
  const ReporteDiario({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _ReporteDiarioState();
}

class _ReporteDiarioState extends State<ReporteDiario> {
  List<ItemReporte> itemsReporte = [];

  SPrefs prefs = SPrefs();

  var usuario = '';
  var vueltas = 0;
  var numrool = '';
  var numcar = 0;
  var total = 0.0;
  File _image = File('');
  RequestClient client = RequestClient();
  Config config = Config();
  List<Egreso> egresos = [];
  Egreso egreso = Egreso(id: 0, egreso: '');
  TextEditingController descController = TextEditingController();
  TextEditingController valueController = TextEditingController();
  bool loading = true;
  @override
  void initState() {
    loadDatos();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return (loading)
        ? Center(
            child: CircularProgressIndicator(),
          )
        : Column(
            children: [
              // Center(
              //     child: Text(
              //   'Fecha: ${DateFormat('yyyy-MM-dd – kk:mm:ss').format(DateTime.now())}',
              //   style: const TextStyle(fontSize: 22),
              // )),
              // Center(
              //     child: Text(
              //   'Vueltas: $vueltas',
              //   style: const TextStyle(fontSize: 30),
              // )),
              DropdownSearch<Egreso>(
                selectedItem: egresos[0],
                mode: Mode.MENU,
                itemAsString: (Egreso? obj) => obj!.egreso,
                items: egresos,
                dropdownSearchDecoration:
                    const InputDecoration(labelText: 'Egreso', hintText: ''),
                onChanged: (element) {
                  egreso = element!;
                  setState(() {
                    egreso;
                  });
                },
              ),
              Padding(
                padding: const EdgeInsets.all(20),
                child: TextField(
                  controller: descController,
                  decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    labelText: 'Descripción',
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.all(20),
                child: TextField(
                  controller: valueController,
                  decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    labelText: 'Valor',
                  ),
                  keyboardType: TextInputType.number,
                  inputFormatters: <TextInputFormatter>[
                    FilteringTextInputFormatter.digitsOnly
                  ],
                ),
              ),
              ElevatedButton(
                child: const Text('Add'),
                onPressed: () {
                  addItemToList();
                },
              ),
              Expanded(
                  child: ListView.builder(
                      physics: const ScrollPhysics(),
                      shrinkWrap: true,
                      padding: const EdgeInsets.all(8),
                      itemCount: itemsReporte.length,
                      itemBuilder: (BuildContext context, int index) {
                        return Card(
                          child: Column(
                            children: [
                              Text(itemsReporte[index].descripcion),
                              ElevatedButton(
                                  onPressed: () {
                                    getImage(index);
                                  },
                                  child: _buildImage(index)),
                              ElevatedButton(
                                  onPressed: () async {
                                    EgresosProvider ep = EgresosProvider();
                                    await ep.delete(itemsReporte[index].id!);
                                    itemsReporte.removeAt(index);
                                    setState(() {
                                      itemsReporte;
                                    });
                                  },
                                  child: const Icon(Icons.delete)),
                            ],
                          ),
                        );
                      })),
              ElevatedButton(
                  onPressed: () async {
                    print('Enviando reporte diario');
                    Reportes reportes = Reportes();
                    await reportes.enviarReporteDeGastos(itemsReporte);
                    EgresosProvider ep = EgresosProvider();
                    itemsReporte = await ep.egresos();
                    setState(() {
                      itemsReporte;
                    });
                  },
                  child: const Text('Enviar reporte'))
            ],
          );
  }

  Future<void> loadDatos() async {
    usuario = await prefs.getString('usuario');
    vueltas = await prefs.getInt('vueltas');
    total = await prefs.getDouble('total');
    await loadEgresos();
    EgresosProvider ep = EgresosProvider();

    itemsReporte = await ep.egresos();
    setState(() {
      usuario;
      vueltas;
      loading = false;
      itemsReporte;
    });
  }

  Future<void> loadEgresos() async {
    var response = await client
        .get(config.host + ':' + config.port + config.api + '/tipos-egresos');

    print(response.data);
    List<dynamic> map = response.data;

    for (var res in map) {
      print(res);
      egresos.add(Egreso.fromJson(res));
    }
    print(egresos);
    setState(() {
      egresos;
    });
  }

  void addItemToList() async {
    EgresosProvider ep = EgresosProvider();

    await ep.insert(ItemReporte(
        egreso.id, descController.text, double.parse(valueController.text)));
    itemsReporte = await ep.egresos();
    await ep.close();
    setState(() {
      itemsReporte;
    });
  }

  Widget _buildImage(int index) {
    if (_image == null) {
      return ElevatedButton(onPressed: null, child: Text(''));
    } else {
      return Column(
        children: [
          itemsReporte[index].pathImage != ''
              ? Image.file(File(itemsReporte[index].pathImage))
              : const Text('Sin imagen'),
          Text(itemsReporte[index].pathImage),
        ],
      );
    }
  }

  final picker = ImagePicker();

  Future getImage(int index) async {
    final pickedFile = await picker.getImage(source: ImageSource.gallery);
    setState(() {
      if (pickedFile != null) {
        _image = File(pickedFile.path);
        itemsReporte[index].pathImage = _image.path;
        _image = File('');
        EgresosProvider ep = EgresosProvider();
        ep.update(itemsReporte[index]);
      } else {
        print('No image selected.');
      }
    });
  }
}
