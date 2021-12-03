import 'dart:convert';
import 'dart:developer';
import 'dart:io';

import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:boletera_bt/main.dart';
import 'package:cookie_jar/cookie_jar.dart';
import 'package:dio/dio.dart';
import 'package:dio_cookie_manager/dio_cookie_manager.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:dio/src/response.dart' as dioresponse;
import 'package:dio/src/form_data.dart' as dioformdata;
import 'package:path_provider/path_provider.dart';

class RequestClient {
  final Dio _dio = Dio();
  SPrefs prefs = SPrefs();
  RequestClient() {
    init();
  }

  void init() async {
    Directory tempDir = await getTemporaryDirectory();
    print('directorio para sesion dio ');
    print(tempDir.path);
    await tempDir.create();
    var tempPath = tempDir.path;
    var cookieJar = PersistCookieJar(storage: FileStorage(tempPath));

    _dio.interceptors.add(CookieManager(cookieJar));
  }

  Future<dioresponse.Response> get(String url) async {
    await checkSesion();
    var response = await _dio.get(
      url,
      options: Options(
        headers: {
          'Authorization': 'Bearer ' + await prefs.getString('access_token')
        },
        followRedirects: false,
        validateStatus: (status) {
          return status! < 500;
        },
      ),
    );
    return response;
  }

  Future<dioresponse.Response> post(String url, dynamic data) async {
    var config = Config();
    await checkSesion();

    var response = await _dio.post(
      url.trim(),
      data: data,
      options: Options(
        headers: {
          'Authorization': 'Bearer ' + await prefs.getString('access_token')
        },
        followRedirects: false,
        validateStatus: (status) {
          return status! < 500;
        },
      ),
    );
    return response;
  }

  Future<dioresponse.Response> postReporte(
      String url, Map<String, dynamic> data) async {
    var config = Config();
    await checkSesion();

    dioformdata.FormData datos = dioformdata.FormData.fromMap(data);
    print(url.trim());
    var response = await _dio.post(
      url.trim(),
      data: datos,
      options: Options(
        headers: {
          'Authorization': 'Bearer ' + await prefs.getString('access_token')
        },
        followRedirects: false,
        validateStatus: (status) {
          return status! < 500;
        },
      ),
    );
    return response;
  }

  Future<dioresponse.Response> login(
      String url, String url_token, String user, String pass) async {
    try {
      var response = await _dio.post(
        url,
        data: {'email': '$user', 'password': '$pass'},
        options: Options(
            followRedirects: true,
            validateStatus: (status) {
              return status! < 500;
            }),
      );
      log(response.toString());
      return response;
    } catch (e) {
      print('error');
      print(e.toString());
    }
    return dioresponse.Response(
        requestOptions: RequestOptions(path: '', baseUrl: url), data: {});
  }

  Future<void> checkSesion() async {
    var config = Config();
    print('check sesion');
    print(config.host + ':' + config.port + config.api + '/check');
    var response = await _dio.get(
      config.host + ':' + config.port + config.api + '/check',
      options: Options(
        headers: {
          'Authorization': 'Bearer ' + await prefs.getString('access_token')
        },
        followRedirects: false,
        validateStatus: (status) {
          return status! < 500;
        },
      ),
    );
    print(response.statusCode);
    if (response.statusCode != 200) {
      await prefs.setBool('logged', false);
      Get.to(const MainScreen());
      Fluttertoast.showToast(
          msg: "Tu sesion ha terminado",
          toastLength: Toast.LENGTH_SHORT,
          gravity: ToastGravity.CENTER,
          timeInSecForIosWeb: 1,
          backgroundColor: Colors.red,
          textColor: Colors.white,
          fontSize: 16.0);
    }
  }

  Future<void> checkConnection() async {
    var config = Config();
    print('check sesion');
    print(config.host + ':' + config.port + config.api + '/check');
    var response = await _dio.get(
      config.host + ':' + config.port + config.api + '/check',
      options: Options(
        headers: {
          'Authorization': 'Bearer ' + await prefs.getString('access_token')
        },
        followRedirects: false,
        validateStatus: (status) {
          return status! < 500;
        },
      ),
    );
    print(response.statusCode);
    if (response.statusCode != 200) {
      await prefs.setBool('logged', false);
      Get.to(const MainScreen());
      Fluttertoast.showToast(
          msg: "Tu sesion ha terminado",
          toastLength: Toast.LENGTH_SHORT,
          gravity: ToastGravity.CENTER,
          timeInSecForIosWeb: 1,
          backgroundColor: Colors.red,
          textColor: Colors.white,
          fontSize: 16.0);
    }
  }
}
