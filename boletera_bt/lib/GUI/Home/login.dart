import 'dart:convert';
import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:boletera_bt/extensions.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/main.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:shared_preferences/shared_preferences.dart';

class HomeLogin extends StatefulWidget {
  const HomeLogin({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _HomeLoginState();
}

class _HomeLoginState extends State<HomeLogin> {
  RequestClient client = RequestClient();
  SPrefs prefs = SPrefs();
  var logged = false;
  bool checking = false;

  final _userController = TextEditingController();
  final _passController = TextEditingController();
  bool isAnimating = true;

  ButtonState state = ButtonState.init;

  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    final buttonWidth = MediaQuery.of(context).size.width;
    // update the UI depending on below variable values
    final isInit = isAnimating || state == ButtonState.init;
    final isDone = state == ButtonState.completed;
    return Scaffold(
      body: ListView(
        children: [
          //Image.asset('logo'),
          Image.asset('assets/images/Logo.png'),
          const Text(
            'Iniciar sesión',
            style: TextStyle(fontSize: 20),
          ),
          const SizedBox(
            height: 20,
          ),
          TextField(
            controller: _userController,
            decoration: InputDecoration(
              labelText: 'Correo electronico:',
              labelStyle: TextStyle(color: HexColor.fromHex('#B5B5B5')),
              enabledBorder: OutlineInputBorder(
                borderSide:
                    BorderSide(width: 3, color: HexColor.fromHex('#B5B5B5')),
                borderRadius: BorderRadius.circular(15),
              ),
            ),
          ),

          const SizedBox(
            height: 20,
          ),
          TextField(
            controller: _passController,
            decoration: InputDecoration(
              labelText: 'Contraseña:',
              labelStyle: TextStyle(color: HexColor.fromHex('#B5B5B5')),
              enabledBorder: OutlineInputBorder(
                borderSide:
                    BorderSide(width: 3, color: HexColor.fromHex('#B5B5B5')),
                borderRadius: BorderRadius.circular(15),
              ),
            ),
            obscureText: true,
          ),

          Container(
            alignment: Alignment.center,
            padding: const EdgeInsets.all(40),
            child: AnimatedContainer(
                duration: const Duration(milliseconds: 300),
                onEnd: () => setState(() {
                      isAnimating = !isAnimating;
                    }),
                width: state == ButtonState.init ? buttonWidth : 60,
                height: 50,
                // If Button State is Submiting or Completed  show 'buttonCircular' widget as below
                child: isInit ? buildButton() : circularContainer(isDone)),
          )
        ],
      ),
    );
  }

  Widget buildButton() => ElevatedButton(
        style: ElevatedButton.styleFrom(
            shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(10.0),
        )),
        onPressed: () async {
          // here when button is pressed
          // we are changing the state
          // therefore depending on state our button UI changed.
          setState(() {
            state = ButtonState.submitting;
          });
          //await 2 sec // you need to implement your server response here.
          await login('', '');
          setState(() async {
            if (await prefs.getBool('logged')) {
              state = ButtonState.completed;
            } else {
              state = ButtonState.init;
            }
          });
          await Future.delayed(const Duration(seconds: 2));
        },
        child: const Text(
          'Ingresar',
          style: TextStyle(fontSize: 20),
        ),
      );

  Widget circularContainer(bool done) {
    final color = done ? Colors.green : Colors.blue;
    return Container(
      decoration: BoxDecoration(shape: BoxShape.circle, color: color),
      child: Center(
        child: done
            ? const Icon(Icons.done, size: 50, color: Colors.white)
            : const CircularProgressIndicator(
                color: Colors.white,
              ),
      ),
    );
  }

  Future<void> login(String user, String pass) async {
    checking = true;
    setState(() {
      checking;
    });

    try {
      print('Login');
      var config = Config();
      var response = await client.login(
          config.host + ':' + config.port + config.api + '/inicio_sesion',
          config.host + ':' + config.port + config.api + '/getToken',
          _userController.text,
          _passController.text);

      print(response);

      if (response.data['access_token'] != null) {
        await prefs.setString('usuario', response.data['usuario']);
        await prefs.setBool('logged', true);
        await prefs.setString('token_limit', response.data['expires_at']);
        await prefs.setString('access_token', response.data['access_token']);
        Get.to(const MainScreen());
      } else {
        checking = false;
        setState(() {
          checking;
        });
        Fluttertoast.showToast(
            msg: "Usuario o Contraseña incorrectos",
            toastLength: Toast.LENGTH_SHORT,
            gravity: ToastGravity.CENTER,
            timeInSecForIosWeb: 1,
            backgroundColor: Colors.red,
            textColor: Colors.white,
            fontSize: 16.0);
      }
    } catch (e) {
      print(e.toString());
    }
  }

  void load() async {}
}

enum ButtonState { init, submitting, completed }
