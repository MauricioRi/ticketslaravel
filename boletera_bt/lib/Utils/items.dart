import 'package:bottom_bar/bottom_bar.dart';
import 'package:flutter/material.dart';

class Items {
  final navbarItems = [
    BottomBarItem(
      icon: const Icon(Icons.home),
      title: const Text('Pasajes'),
      activeColor: Colors.blue,
    ),
    BottomBarItem(
      icon: const Icon(Icons.home),
      title: const Text('Reportes'),
      activeColor: Colors.blue,
    ),
    BottomBarItem(
      icon: const Icon(Icons.settings),
      title: const Text('Configuración'),
      activeColor: Colors.blue,
    ),

    
  ];

  final navbarScreens = [
    
  ];
}
