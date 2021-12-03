import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Models/rutas.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:boletera_bt/main.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class ElegirRuta extends StatefulWidget {
  const ElegirRuta({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() =>  _ElegirRutaState();
}

class _ElegirRutaState extends State<ElegirRuta> {
  RequestClient client = RequestClient();
  Config config = Config();
  List<Rutas> rutas = [];
  var miRuta;
  bool loading = true;
  SPrefs prefs = SPrefs();

  @override
  void initState() {
    loadRutas();
    super.initState();
    
  }

  @override
  Widget build(BuildContext context) {
    return (loading)
        ? const Center(child: CircularProgressIndicator())
        : ListView.builder(
            itemCount: rutas.length,
            itemBuilder: (BuildContext context, int index) {
              return ListTile(
                title: Text(rutas[index].nameRoute),
                onTap: () async {
                  print(index);
                  
                  await prefs.setInt('ruta', rutas[index].id);
                  Navigator.pushReplacement(
                      context,
                      MaterialPageRoute(
                          builder: (BuildContext context) => MainScreen()));
                },
              );
            });
  }

  void loadRutas() async {
    var response = await client
        .get(config.host + ':' + config.port + config.api + '/rutas');
    print(config.host + ':' + config.port + config.api + '/rutas');
    print('loading rutas');
    print(response.data);
    List<dynamic> map = response.data;

    for (var res in map) {
      print(res);
      rutas.add(Rutas.fromJson(res));
    }
    print(rutas);
    setState(() {
      rutas;
      loading = false;
    });
  }
}
