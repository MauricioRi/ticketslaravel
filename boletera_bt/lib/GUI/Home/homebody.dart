import 'dart:convert';
import 'dart:developer';
import 'dart:math';

import 'package:boletera_bt/GUI/Home/elegir_ruta.dart';
import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Models/geocercas.dart';
import 'package:boletera_bt/Models/geodata.dart';
import 'package:boletera_bt/Models/local.dart';
import 'package:boletera_bt/Models/pasajero.dart';
import 'package:boletera_bt/Models/precios.dart';
import 'package:boletera_bt/Models/rutas.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/items.dart';
import 'package:boletera_bt/Utils/point_calculator.dart';
import 'package:boletera_bt/Utils/printer_utils.dart';
import 'package:boletera_bt/Utils/reportes.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:bottom_bar/bottom_bar.dart';
import 'package:dropdown_search/dropdown_search.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';
import 'package:latlong2/latlong.dart';
import 'package:shared_preferences/shared_preferences.dart';

class HomeBody extends StatefulWidget {
  const HomeBody({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _HomeBodyState();
}

class _HomeBodyState extends State<HomeBody>
    with SingleTickerProviderStateMixin, AutomaticKeepAliveClientMixin {
  int boletos = 1;
  double totalPagar = 0;
  int pasajeros = 0;
  RequestClient client = RequestClient();
  Config config = Config();
  GeoUtils gu = GeoUtils();
  List<Rutas> rutas = [];
  List<LatLng> centros = [];
  List<Precios> precios = [];
  List<GeoData> geoData = [];
  List<Pasajero> listaPasajeros = [];
  int lastPasajero = 1;
  var miRuta = null;
  bool loading = true;
  bool addingBoletos = false;
  var reportes = Reportes();

  //Boletos
  int actual = 1;
  int selectedScreen = 0;
  final _pageController = PageController();
  GeoData origen = GeoData(0, '', [], LatLng(0, 0), 0);
  GeoData last_origen = GeoData(0, '', [], LatLng(0, 0), 0);
  GeoData destino = GeoData(0, '', [], LatLng(0, 0), 0);
  bool working = false;
  SPrefs prefs = SPrefs();
  double totalGanancias = 0;
  bool vueltaCompleta = false;
  bool resetVuelta = true;
  bool printer_ready = false;
  bool multiples_boletos = false;

  bool workin = false;

  @override
  void initState() {
    init();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      floatingActionButton: FloatingActionButton(
        child:
            Icon(Icons.lock_open, color: (workin ? Colors.red : Colors.green)),
        onPressed: () async {
          prefs.setBool('trabajando', !await prefs.getBool('trabajando'));
          if (!await prefs.getBool('trabajando')) {
            print('Enviando reporte diario');
          } else {}
          load();
        },
      ),
      body: Container(
        child: (loading)
            ? const Center(child: CircularProgressIndicator())
            : (miRuta == null || miRuta == 0)
                ? const ElegirRuta()
                : ListView(
                    shrinkWrap: true,
                    children: [
                      Center(
                          child: Text(
                        'Ruta: ${rutas.where((element) => element.id == miRuta).first.nameRoute}',
                        style: const TextStyle(fontSize: 40),
                      )),
                      Center(
                          child: Text(
                        'Pasajeros del dia: $pasajeros',
                        style: const TextStyle(fontSize: 40),
                      )),
                      const SizedBox(
                        height: 30,
                      ),
                      ElevatedButton(
                          onPressed: () async {
                            printer_ready =
                                await prefs.getBool('pinter_connected');
                            print(await prefs.getBool('pinter_connected'));
                            setState(() {
                              printer_ready;
                            });
                            if (!addingBoletos) {
                              await obtenerGeoActual();
                            }
                            boletos = 1;
                            totalPagar = double.parse(precios
                                    .where((element) =>
                                        element.idOrigin == origen.id &&
                                        element.idDestination == destino.id)
                                    .first
                                    .amount) *
                                boletos;

                            setState(() {
                              addingBoletos = !addingBoletos;
                              boletos;
                              totalPagar;
                            });
                          },
                          child: const Text('Pasajes')),
                      const SizedBox(
                        height: 30,
                      ),
                      (addingBoletos)
                          ? (!printer_ready)
                              ? const Text('Impresora no conectada')
                              : Column(
                                  children: [
                                    DropdownSearch<GeoData>(
                                      selectedItem: origen,
                                      mode: Mode.MENU,
                                      itemAsString: (GeoData? geo) =>
                                          geo!.nombre,
                                      items: geoData,
                                      dropdownSearchDecoration:
                                          const InputDecoration(
                                              labelText: 'Origen',
                                              hintText: 'Lugar actual'),
                                      onChanged: (element) {
                                        actual = geoData.indexOf(element!) + 1;
                                        origen = destino = element;
                                        totalPagar = double.parse(precios
                                                .where((element) =>
                                                    element.idOrigin ==
                                                        origen.id &&
                                                    element.idDestination ==
                                                        destino.id)
                                                .first
                                                .amount) *
                                            boletos;
                                        setState(() {
                                          actual;
                                          destino;
                                          totalPagar;
                                        });
                                      },
                                    ),
                                    const SizedBox(
                                      height: 30,
                                    ),
                                    DropdownSearch<GeoData>(
                                      selectedItem: destino,
                                      mode: Mode.MENU,
                                      itemAsString: (GeoData? geo) =>
                                          geo!.nombre,
                                      items: geoData.sublist(actual - 1),
                                      dropdownSearchDecoration:
                                          const InputDecoration(
                                              labelText: 'Destino',
                                              hintText: 'Donde bajan'),
                                      onChanged: (element) {
                                        destino = element!;
                                        totalPagar = double.parse(precios
                                                .where((element) =>
                                                    element.idOrigin ==
                                                        origen.id &&
                                                    element.idDestination ==
                                                        destino.id)
                                                .first
                                                .amount) *
                                            boletos;
                                        setState(() {
                                          totalPagar;
                                        });
                                      },
                                    ),
                                    const SizedBox(
                                      height: 10,
                                    ),
                                    const Text('Cuantos boletos'),
                                    const SizedBox(
                                      height: 10,
                                    ),
                                    (multiples_boletos)
                                        ? Row(
                                            crossAxisAlignment:
                                                CrossAxisAlignment.center,
                                            mainAxisAlignment:
                                                MainAxisAlignment.center,
                                            children: [
                                              ElevatedButton(
                                                  onPressed: () {
                                                    if (boletos - 1 > 0) {
                                                      boletos -= 1;
                                                      totalPagar = double.parse(precios
                                                              .where((element) =>
                                                                  element.idOrigin ==
                                                                      origen
                                                                          .id &&
                                                                  element.idDestination ==
                                                                      destino
                                                                          .id)
                                                              .first
                                                              .amount) *
                                                          boletos;
                                                      setState(() {
                                                        boletos;
                                                        totalPagar;
                                                      });
                                                    }
                                                  },
                                                  child: const Text('-')),
                                              const SizedBox(
                                                width: 10,
                                              ),
                                              Text(
                                                boletos.toString(),
                                                style: const TextStyle(
                                                    fontSize: 20),
                                              ),
                                              const SizedBox(
                                                width: 10,
                                              ),
                                              ElevatedButton(
                                                  onPressed: () {
                                                    print(precios);
                                                    boletos += 1;
                                                    totalPagar = double.parse(precios
                                                            .where((element) =>
                                                                element.idOrigin ==
                                                                    origen.id &&
                                                                element.idDestination ==
                                                                    destino.id)
                                                            .first
                                                            .amount) *
                                                        boletos;
                                                    setState(() {
                                                      boletos;
                                                      totalPagar;
                                                    });
                                                  },
                                                  child: const Text('+')),
                                            ],
                                          )
                                        : SizedBox(),
                                    const SizedBox(
                                      width: 10,
                                    ),
                                    Text('Total: $totalPagar'),
                                    ElevatedButton(
                                        onLongPress: () {
                                          setState(() {
                                            multiples_boletos = true;
                                          });
                                        },
                                        onPressed: () async {
                                          UtileriasImpresora ui =
                                              UtileriasImpresora();
                                          var ticket = [
                                            DateTime.now().toString(),
                                            'Boleto de :${origen.nombre} a ${origen.nombre}',
                                            'Costo : $totalPagar'
                                          ];
                                          var boletoImpreso = 1;
                                          for (boletoImpreso;
                                              boletoImpreso <= boletos;
                                              boletoImpreso++) {
                                            listaPasajeros.add(Pasajero(
                                                lastPasajero,
                                                origen.id,
                                                destino.id));
                                            lastPasajero += 1;
                                            pasajeros += 1;
                                            await showDialog(
                                              context: context,
                                              builder: (context) => AlertDialog(
                                                content: Text(
                                                    'Imprimiendo boleto ' +
                                                        boletoImpreso
                                                            .toString()),
                                                actions: [
                                                  ElevatedButton(
                                                      onPressed: () {
                                                        Navigator.of(context)
                                                            .pop();
                                                      },
                                                      child: const Text('Ok'))
                                                ],
                                              ),
                                            );
                                            ui.printLines(ticket);
                                          }
                                          if (vueltaCompleta &&
                                              resetVuelta == false) {
                                            await prefs.setInt(
                                                'vueltas',
                                                await prefs.getInt('vueltas') +
                                                    1);
                                            vueltaCompleta = false;
                                          }
                                          await reportes.crearRegistroPasajero(
                                              boletos, miRuta);
                                          await prefs.setInt(
                                              'pasajeros', pasajeros);
                                          addingBoletos = false;
                                          totalGanancias += totalPagar;
                                          totalPagar = 0;
                                          await prefs.setDouble(
                                              'total', totalGanancias);
                                          setState(() {
                                            addingBoletos;
                                            pasajeros;
                                            totalPagar;
                                            multiples_boletos = false;
                                          });
                                        },
                                        child: const Text('Imprimir'))
                                  ],
                                )
                          : const Divider(),
                    ],
                  ),
      ),
    );
  }

  init() async {
    printer_ready = await prefs.getBool('pinter_connected');
    await loadData();
    await loadRutas();
    await loadMiRuta();
    load();
  }

  void load() async {
    workin = await prefs.getBool('trabajando');
    setState(() {
      workin;
    });
  }

  Future<Position> obtenerPosicion() async {
    return await Geolocator.getCurrentPosition();
  }

  Future<dynamic> obtenerGeoActual() async {
    var position = await obtenerPosicion();
    actual = 1;
    origen = GeoData(0, '', [], LatLng(0, 0), 0);
    for (var g in geoData) {
      List<Point> puntos = [];
      for (var ll in g.puntos) {
        puntos.add(Point(ll.latitude, ll.longitude));
      }
      bool inside = gu.isInside(
          puntos, puntos.length, Point(position.latitude, position.longitude));

      if (inside) {
        origen = g;
        if (actual + 1 > geoData.length &&
            vueltaCompleta == false &&
            resetVuelta) {
          print('vuelta completa');
          last_origen = origen;
          vueltaCompleta = true;
        } else {
          last_origen = GeoData(0, '', [], LatLng(0, 0), 0);
          vueltaCompleta = false;
        }
        break;
      }
      actual += 1;
    }

    if (origen.id == 0) {
      actual = 1;

      var distance = 0.0;
      for (var g in geoData) {
        if (distance == 0.0) {
          distance = gu.calculateDistance(position.latitude, position.longitude,
              g.centro.latitude, g.centro.longitude);
          origen = g;
        } else {
          var newdistance = gu.calculateDistance(position.latitude,
              position.longitude, g.centro.latitude, g.centro.longitude);
          if (newdistance < distance) {
            distance = newdistance;
            origen = g;
            actual += 1;
          }
        }
      }
    }
    destino = origen;
    setState(() {
      actual;
      origen;
      destino;
    });

    return [actual, origen];
  }

  Future<void> loadData() async {
    pasajeros = await prefs.getInt('pasajeros');
  }

  Future<void> loadRutas() async {
    if (await prefs.has('rutas')) {
      print('Loading rutas from cache');
      var stringRutas = await prefs.getString('rutas');
      print(stringRutas);
      List<dynamic> map = json.decode(stringRutas);
      print(stringRutas);
      for (var res in map) {
        rutas.add(Rutas.fromJson(res));
      }
    } else {
      print('Loading rutas from web');
      var response = await client
          .get(config.host + ':' + config.port + config.api + '/rutas/');
      print(response.data);
      List<dynamic> map = response.data;
      for (var res in map) {
        rutas.add(Rutas.fromJson(res));
      }
      await prefs.setString('rutas', json.encode(response.data));
    }
  }

  Future<void> loadMiRuta() async {
    print('Cargando mi ruta');
    miRuta = await prefs.getInt('ruta');
    miRuta = miRuta != null ? miRuta : null;
    print(miRuta);
    if (miRuta != null) {
      geoData.clear();
      await loadCentros();
      await loadPrecios();
    }
    setState(() {
      miRuta;
      rutas;
      pasajeros;
      printer_ready;
      loading = false;
    });
  }

  Future<void> loadCentros() async {
    List<dynamic> map = [];
    print('cargando centros');
    if (await prefs.has('centros')) {
      var stringCentros = await prefs.getString('centros');
      print(stringCentros);
      map = json.decode(stringCentros);
      if (map.isEmpty) {
        var response = await client.get(config.host +
            ':' +
            config.port +
            config.api +
            '/geocercas/' +
            miRuta.toString());
        map = response.data;
        await prefs.setString('centros', json.encode(response.data));
      }
    } else {
      var response = await client.get(config.host +
          ':' +
          config.port +
          config.api +
          '/geocercas/' +
          miRuta.toString());
      map = response.data;
      await prefs.setString('centros', json.encode(response.data));
    }

    GeoUtils geoUtils = GeoUtils();

    for (var res in map) {
      List<LatLng> geopuntos = [];
      Geocerca geo = Geocerca.fromJson(res);
      var latslongs = geo.datos
          .replaceAll('[', '')
          .replaceAll(']', '')
          .replaceAll('"', '')
          .split(',');
      var lat = '';
      var lng = '';
      for (var v in latslongs) {
        if (lat == '') {
          lat = v;
        } else {
          lng = v;
        }
        if (lng != '') {
          geopuntos.add(LatLng(double.parse(lat), double.parse(lng)));
          lat = '';
          lng = '';
        }
      }
      geoData.add(GeoData(geo.id, geo.nombre, geopuntos.toList(),
          geoUtils.getCenterLatLong(geopuntos), geo.amount));
      geopuntos.clear();
    }
  }

  Future<void> loadPrecios() async {
    List<dynamic> map = [];
    if (await prefs.has('precios')) {
      var stringPrecios = await prefs.getString('precios');
      map = json.decode(stringPrecios);
      if (map.isEmpty) {
        var response = await client.get(config.host +
            ':' +
            config.port +
            config.api +
            '/precios/' +
            miRuta.toString());

        map = response.data;
        await prefs.setString('precios', json.encode(response.data));
      }
    } else {
      var response = await client.get(config.host +
          ':' +
          config.port +
          config.api +
          '/precios/' +
          miRuta.toString());

      map = response.data;
      await prefs.setString('precios', json.encode(response.data));
    }

    for (var res in map) {
      precios.add(Precios.fromJson(res));
    }
  }

  Future<void> conteoDePasajeros() async {}

  @override
  // TODO: implement wantKeepAlive
  bool get wantKeepAlive => true;
}
