import 'dart:convert';
import 'dart:developer';
import 'dart:typed_data';

import 'package:bluetooth_print/bluetooth_print.dart';
import 'package:bluetooth_print/bluetooth_print_model.dart';
import 'package:boletera_bt/GUI/Home/elegir_ruta.dart';
import 'package:boletera_bt/GUI/Home/login.dart';
import 'package:boletera_bt/GUI/Home/printerscreen.dart';
import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:boletera_bt/main.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:shared_preferences/shared_preferences.dart';

class Menu extends StatefulWidget {
  const Menu({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _MenuState();
}

class _MenuState extends State<Menu> with AutomaticKeepAliveClientMixin {
  SPrefs prefs = SPrefs();
  BluetoothPrint bluetoothPrint = BluetoothPrint.instance;

  bool _connected = false;
  BluetoothDevice? _device = null;
  String tips = 'No conectado';

  @override
  void initState() {
    WidgetsBinding.instance?.addPostFrameCallback((_) => initBluetooth());
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return ListView(
      children: [
        ElevatedButton(
          onPressed: () async {
            await prefs.setBool('logged', false);
            await prefs.setString('access_token', '');
            Fluttertoast.showToast(
                msg: "Cerrando sesion",
                toastLength: Toast.LENGTH_SHORT,
                gravity: ToastGravity.CENTER,
                timeInSecForIosWeb: 1,
                backgroundColor: Colors.red,
                textColor: Colors.white,
                fontSize: 16.0);

            Navigator.pushReplacement(
                context,
                MaterialPageRoute(
                    builder: (BuildContext context) => const MainScreen()));
          },
          child: const Text('Salir'),
        ),
        ElevatedButton(
            onPressed: () async {
              showDialog(
                context: context,
                builder: (context) => AlertDialog(
                  content: setupAlertDialoadContainer(),
                  actions: [
                    ElevatedButton(
                        onPressed: () {
                          Navigator.of(context).pop();
                        },
                        child: const Text('Ok'))
                  ],
                ),
              );
            },
            child: const Text('Cambiar de ruta')),
        Card(
          child: RefreshIndicator(
            onRefresh: () =>
                bluetoothPrint.startScan(timeout: const Duration(seconds: 4)),
            child: SingleChildScrollView(
              child: Column(
                children: <Widget>[
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.symmetric(
                            vertical: 10, horizontal: 10),
                        child: Text(tips),
                      ),
                    ],
                  ),
                  const Divider(),
                  StreamBuilder<List<BluetoothDevice>>(
                    stream: bluetoothPrint.scanResults,
                    initialData: [],
                    builder: (c, snapshot) => Column(
                      children: snapshot.data!
                          .map((d) => ListTile(
                                title: Text(d.name ?? ''),
                                subtitle: Text(d.address!),
                                onTap: () async {
                                  setState(() {
                                    _device = d;
                                  });
                                },
                                trailing: _device != null &&
                                        _device?.address == d.address
                                    ? const Icon(
                                        Icons.check,
                                        color: Colors.green,
                                      )
                                    : null,
                              ))
                          .toList(),
                    ),
                  ),
                  const Divider(),
                  Container(
                    padding: const EdgeInsets.fromLTRB(20, 5, 20, 10),
                    child: Column(
                      children: <Widget>[
                        Row(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: <Widget>[
                            OutlinedButton(
                              child: const Text('Conectar'),
                              onPressed: _connected
                                  ? null
                                  : () async {
                                      if (_device != null &&
                                          _device?.address != null) {
                                        await bluetoothPrint.connect(_device!);
                                        await prefs.setBool(
                                            'pinter_connected', true);
                                        print(await prefs
                                            .getBool('pinter_connected'));
                                      } else {
                                        setState(() {
                                          tips = 'Elija un dispositivo';
                                        });
                                        print('please select device');
                                      }
                                    },
                            ),
                            SizedBox(width: 10.0),
                            OutlinedButton(
                              child: const Text('Desconectar'),
                              onPressed: _connected
                                  ? () async {
                                      await bluetoothPrint.disconnect();
                                      await prefs.setBool(
                                          'pinter_connected', false);
                                      print(await prefs
                                          .getBool('pinter_connected'));
                                    }
                                  : null,
                            ),
                          ],
                        ),
                        OutlinedButton(
                          child: const Text('Buscar'),
                          onPressed: () async {
                            bluetoothPrint.startScan(
                                timeout: const Duration(seconds: 4));
                          },
                        )
                      ],
                    ),
                  )
                ],
              ),
            ),
          ),
        ),
      ],
    );
  }

  Widget setupAlertDialoadContainer() {
    return const SizedBox(
      height: 300.0, // Change as per your requirement
      width: 300.0, // Change as per your requirement
      child: ElegirRuta(),
    );
  }

  Future<void> initBluetooth() async {
    bluetoothPrint.startScan(timeout: const Duration(seconds: 5));

    bool? isConnected = await bluetoothPrint.isConnected;

    bluetoothPrint.state.listen((state) {
      print('cur device status: $state');

      switch (state) {
        case BluetoothPrint.CONNECTED:
          setState(() {
            _connected = true;
            tips = 'Conectado';
          });
          break;
        case BluetoothPrint.DISCONNECTED:
          setState(() {
            _connected = false;
            tips = 'Desconectado';
          });
          break;
        default:
          break;
      }
    });

    if (!mounted) return;

    if (isConnected!) {
      setState(() {
        _connected = true;
      });
    }
  }

  @override
  // TODO: implement wantKeepAlive
  bool get wantKeepAlive => true;
}
