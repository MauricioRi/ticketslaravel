import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get_it/get_it.dart';
GetIt getIt = GetIt.asNewInstance();


class Login extends StatefulWidget {
  @override
  State<StatefulWidget> createState() => _LoginState();
  
}

class _LoginState extends State<Login> {
  @override
  Widget build(BuildContext context) {
    return Container(
      child: ListView(
        children: [
          Image.asset('logo'),
          const Text('Usuario:'),
          const TextField(),
          const Text('Contraseña:'),
          const TextField(),
          ElevatedButton(
            child: const Text('Iniciar sesión'),
            onPressed: (){
              setState(() {
                
              });
            },
          )
        ],
      ),
    );
  }

}