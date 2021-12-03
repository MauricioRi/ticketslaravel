import 'dart:developer';

import 'package:shared_preferences/shared_preferences.dart';

class SPrefs {
  Future<bool> setString(String key, String value) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      await prefs.setString(key, value);
      return true;
    } on Exception catch (e) {
      log(e.toString());
      return false;
    }
  }

  Future<bool> setBool(String key, bool value) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      await prefs.setBool(key, value);
      return true;
    } on Exception catch (e) {
      log(e.toString());
      return false;
    }
  }

  Future<bool> setInt(String key, int value) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      await prefs.setInt(key, value);
      return true;
    } on Exception catch (e) {
      log(e.toString());
      return false;
    }
  }

  Future<bool> setDouble(String key, double value) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      await prefs.setDouble(key, value);
      return true;
    } on Exception catch (e) {
      log(e.toString());
      return false;
    }
  }

  Future<String> getString(String key) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      return prefs.getString(key)??'';
    } on Exception catch (e) {
      log(e.toString());
      return '';
    }
  }

  Future<bool> getBool(String key) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      return prefs.getBool(key)??false;
    } on Exception catch (e) {
      log(e.toString());
      return false;
    }
  }

  Future<int> getInt(String key) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      return prefs.getInt(key)??0;
    } on Exception catch (e) {
      log(e.toString());
      return 0;
    }
  }

  Future<double> getDouble(String key) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      var result = prefs.getDouble(key);
      return result ?? 0;
    } on Exception catch (e) {
      log(e.toString());
      return 0;
    }
  }

  Future<bool> has(String key) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    try {
      return prefs.containsKey(key);
    } on Exception catch (e) {
      log(e.toString());
      return false;
    }
  }
}
