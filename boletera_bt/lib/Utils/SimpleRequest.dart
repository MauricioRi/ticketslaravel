import 'dart:convert';
import 'dart:developer';

import 'package:get_it/get_it.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';


GetIt getIt = GetIt.instance;

class SimpleRequests {
  Future<dynamic> get(String url, {Map<String, String>? headers}) async {
    var response = await http.get(Uri.parse(url), headers: headers);
    log(response.body);
    if (response.statusCode == 200) {
      return json.decode(response.body);
    }
    return json.decode(response.body);
  }

  Future<dynamic> getRaw(String url, {Map<String, String>? headers}) async {
    var response = await http.get(Uri.parse(url), headers: headers);

    if (response.statusCode == 200) {
      return response.body;
    } else
      return null;
  }

  Future<dynamic> post(String url,
      {Map<String, String>? headers, Map<String, dynamic>? body}) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    
    var response =
        await http.post(Uri.parse(url), headers: headers, body: body);
    log(response.body);
    var jsonResponse = json.decode(response.body);

    return jsonResponse;
  }

  Future<dynamic> postGToken(String url,
      {Map<String, String>? headers, Map<String, dynamic>? body}) async {
    
    var response =
        await http.post(Uri.parse(url), headers: headers, body: body);
    var jsonResponse = json.decode(response.body);

    return jsonResponse;
  }

  Future<dynamic> put(String url,
      {Map<String, String>? headers, Map<String, dynamic>? body}) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    
    var response = await http.put(Uri.parse(url), headers: headers, body: body);
    var jsonResponse = json.decode(response.body);

    return jsonResponse;
  }

  Future<dynamic> delete(String url, {Map<String, String>? headers}) async {
    var response = await http.delete(Uri.parse(url),
        headers: headers);
    var jsonResponse = json.decode(response.body);

    return jsonResponse;
  }
}
