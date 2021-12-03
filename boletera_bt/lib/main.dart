import 'dart:convert';
import 'dart:developer';
import 'package:animated_splash_screen/animated_splash_screen.dart';
import 'package:boletera_bt/GUI/Home/home.dart';
import 'package:boletera_bt/GUI/Home/login.dart';
import 'package:boletera_bt/Helpers/helper_egreso.dart';
import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Models/local.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/point_calculator.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:boletera_bt/extensions.dart';

import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';
import 'package:get/get_navigation/src/root/get_material_app.dart';

import 'package:permission_handler/permission_handler.dart';
import 'package:flutter_localizations/flutter_localizations.dart';

const updateLocationTask = "updatePositionTask";

Future main() async {
  WidgetsFlutterBinding.ensureInitialized();
  var prefs = SPrefs();
  //prefs
  /*
  logged
  position

  */
  if (await prefs.has('logged')) {
    if ((await prefs.getBool('logged'))) {}
  } else {
    await prefs.setBool('logged', false);
  }

  if (await prefs.has('trabajando')) {
    if ((await prefs.getBool('trabajando'))) {}
  } else {
    await prefs.setBool('trabajando', false);
  }

  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  final TimeOfDay time = TimeOfDay.fromDateTime(DateTime.now());

  MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      localizationsDelegates: const [GlobalMaterialLocalizations.delegate],
      supportedLocales: const [Locale('es')],
      title: 'Boletera',
      debugShowCheckedModeBanner: false,
      initialRoute: '/',
      routes: {
        '/': (ctx) => MySplashApp(true), //MainScreen(),
        '/home': (ctx) => const MainScreen()
      },
      theme: ThemeData(
          visualDensity: VisualDensity.adaptivePlatformDensity,
          appBarTheme: AppBarTheme(color: HexColor.fromHex('#FBB03B'))),
    );
  }
}

class MainScreen extends StatefulWidget {
  const MainScreen({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => MainState();
}

class MySplashApp extends StatefulWidget {
  bool showSplash = true;

  MySplashApp(this.showSplash, {Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _MyAppState(showSplash);
}

class _MyAppState extends State<MySplashApp> {
  bool showSplash = true;
  RequestClient client = RequestClient();
  bool logged = false;
  bool loading = true;

  _MyAppState(this.showSplash);

  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    var args = <String, bool>{};
    try {
      args = ModalRoute.of(context)?.settings.arguments as Map<String, bool>;
    } catch (e) {}

    var retArgs = args['showSplash'] ?? showSplash;
    print(retArgs);
    return (retArgs)
        ? SizedBox(
            width: 500,
            height: 500,
            child: AnimatedSplashScreen(
              duration: 4200,
              splash: Image.asset(
                'assets/images/Logo.png',
              ),
              nextScreen: const MainScreen(),
              backgroundColor: Colors.white,
              centered: true,
              splashIconSize: 400,
            ),
          )
        : const MainScreen();
  }
}

class MainState extends State<MainScreen> {
  RequestClient client = RequestClient();
  bool logged = false;
  bool loading = true;
  SPrefs prefs = SPrefs();

  @override
  void initState() {
    init();
    super.initState();
    //SystemChrome.setEnabledSystemUIOverlays([]);
  }

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      child: (logged) ? const HomeBoletera() : const HomeLogin(),
      onWillPop: _onWillPop,
    );
  }

  Future<bool> _onWillPop() async {
    return false;
  }

  void init() async {
    checkPermisos();

    print('cargando');
    loading = true;
    var loggedIn = await prefs.getBool('logged');
    GeoUtils gu = GeoUtils();

    //checar en el servidor si la sesion sigue abierta
    if (await checkLogged()) {
      logged = true;
      await prefs.setBool('logged', logged);
      setState(() {
        loading = false;
        logged = loggedIn;
      });
    }
  }

  Future<void> checkPermisos() async {
    //await Permission.location.request().isGranted;
    await Permission.locationWhenInUse.request();
    await Permission.bluetooth.request();
    await Permission.bluetoothConnect.request();
    await Permission.bluetoothScan.request();
    await Permission.storage.request();
  }

  void update() => setState(() => {});

  Future<bool> checkLogged() async {
    var l = await prefs.getBool('logged');
    print('logged ' + l.toString());
    return l;
  }

  Future<Position> obtenerPosicion() async {
    return await Geolocator.getCurrentPosition();
  }
}
