import 'package:boletera_bt/Helpers/helper_egreso.dart';
import 'package:boletera_bt/Models/Config.dart';
import 'package:boletera_bt/Models/local.dart';
import 'package:boletera_bt/Models/reporteitem.dart';
import 'package:boletera_bt/Utils/client_.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:dio/dio.dart';

class Reportes {
  Future<void> crearRegistroPasajero(int boletos, int idruta) async {
    var client = RequestClient();
    SPrefs prefs = SPrefs();
    Map data = {};

    print(data);
    var config = Config();
    var resp = await client
        .get(config.host + ':' + config.port + config.api + '/check');
    print(resp);
    var response = await client.post(
        config.host + ':' + config.port + config.api + '/estado-pasajeros',
        data);
    print(response);
  }

  Future<void> enviarReporteDeGastos(List<ItemReporte> itemsReporte) async {
    var client = RequestClient();
    SPrefs prefs = SPrefs();
    Map<String, dynamic> data = {};
    var config = Config();
    EgresosProvider ep = EgresosProvider();
    for (var item in itemsReporte) {
      if (item.pathImage != '') {
        String filename = item.pathImage.split('/').last;
        data = {
          'image':
              await MultipartFile.fromFile(item.pathImage, filename: filename),
          'idruta': await prefs.getInt('ruta'),
          'idegreso': 0,
          'valor': item.valor
        };
      } else {
        data = {
          'idruta': await prefs.getInt('ruta'),
          'idegreso': 0,
          'valor': item.valor
        };
      }

      var resp = await client
          .get(config.host + ':' + config.port + config.api + '/check');
      print(resp);
      var response = await client.postReporte(
          config.host + ':' + config.port + config.api + '/testImg', data);
      print(response);
      print(response.statusCode);
      if (response.statusCode == 201) {
        await ep.delete(item.id!);
      }
    }
  }
}
