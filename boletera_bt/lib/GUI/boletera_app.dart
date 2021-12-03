import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Models/rutas.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/printer_utils.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:boletera_bt/main.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'package:rflutter_alert/rflutter_alert.dart';
import 'package:shared_preferences/shared_preferences.dart';

class BoleteraApp extends StatefulWidget {
  const BoleteraApp({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _BoleteraAppState();
}

class _BoleteraAppState extends State<BoleteraApp> {
  int boletos = 0;
  RequestClient client = RequestClient();
  Config config = Config();
  List<Rutas> rutas = [];
  SPrefs prefs = SPrefs();

  @override
  void initState() {
    
    super.initState();
    
  }


  @override
  Widget build(BuildContext context) {
    return ListView(
      children: [
        const Text('logged'),
        ElevatedButton(
            onPressed: () async {
              
              prefs.setBool('logged', false);
              setState(() {
                Navigator.pushReplacement(
                    context,
                    MaterialPageRoute(
                        builder: (BuildContext context) =>
                            const MainScreen()));
              });
            },
            child: const Text('Salir')),
        ElevatedButton(
            onPressed: () async {
              UtileriasImpresora util = UtileriasImpresora();
              util.printLines(['sdfgsd', 'gdsd', '33333', 'fgsdghdg']);
            },
            child: const Text('Print')),
        ElevatedButton(
          child: const Text('Imprimir boletos'),
          onPressed: () {
            boletos = 0;
            showDialog(
              context: context,
              builder: (context) {
                return StatefulBuilder(
                  builder: (context, setState) {
                    return AlertDialog(
                      title: const Text("Boletos"),
                      content: SizedBox(
                          height: 300,
                          width: 200,
                          child: ListView(
                            shrinkWrap: true,
                            padding: const EdgeInsets.all(30),
                            children: [
                              const Text('Cuantos boletos'),
                              Row(
                                children: [
                                  ElevatedButton(
                                      onPressed: () {}, child: const Text('-')),
                                  Text(boletos.toString()),
                                  ElevatedButton(
                                      onPressed: () {
                                        setState(() {
                                          boletos += 1;
                                        });
                                      },
                                      child: const Text('+')),
                                ],
                              )
                            ],
                          )),
                      actions: <Widget>[
                        TextButton(
                          onPressed: () => Navigator.pop(context),
                          child: const Text("Cancelar"),
                        ),
                        TextButton(
                          onPressed: () {
                            for (var i = 0; i < boletos; i++) {
                              UtileriasImpresora().printLines([
                                i.toString(),
                                'precio: 15',
                                DateTime.now().toString()
                              ]);
                              Alert(context: context).show();
                            }
                            setState(() {});
                          },
                          child: const Text("Imprimir"),
                        ),
                      ],
                    );
                  },
                );
              },
            );
          },
        ),
        ElevatedButton(
          child: const Text('Check'),
          onPressed: () async {
            var response = await client.get('http://192.168.100.8/api/check');
            print(response);
          },
        ),
        ElevatedButton(
          child: const Text('Precios'),
          onPressed: () async {
            var response = await client.get('http://192.168.100.8/api/precios');
            print(response);
          },
        ),
        ElevatedButton(
          child: const Text('Rutas'),
          onPressed: () async {
            var response = await client.get('http://192.168.100.8/api/rutas');
            print(response);
          },
        ),
        ElevatedButton(
          child: const Text('Geocercas'),
          onPressed: () async {
            var response = await client.get('http://192.168.100.8/api/geocercas');
            print(response);
          },
        ),
        ElevatedButton(
          child: const Text('Precios'),
          onPressed: () async {
            var response = await client.get('http://192.168.100.8/api/precios');
            print(response);
          },
        ),
      ],
    );
  }

  void loadRutas() async {
    
  }
}
