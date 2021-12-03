import 'package:bluetooth_print/bluetooth_print.dart';
import 'package:bluetooth_print/bluetooth_print_model.dart';
import 'package:flutter/services.dart';

class UtileriasImpresora {
  BluetoothPrint bluetoothPrint = BluetoothPrint.instance;

  Future<String> printTest() async {
    String res = '';
    try {} on PlatformException catch (e) {
      res = "Error : '${e.message}'.";
      print("Error : '${e.message}'.");
    }

    return res;
  }

  Future<String> paperOut() async {
    String res = '';
    try {
      Map<String, dynamic> config = Map();
      config['width'] = 80; // 标签宽度，单位mm
      config['height'] = 10; // 标签高度，单位mm
      config['gap'] = 1; // 标签间隔，单位mm

      // x、y坐标位置，单位dpi，1mm=8dpi
      List<LineText> list = [];
      list.add(LineText(type: LineText.TYPE_TEXT, content: ''));

    } catch (e) {
      res = "Error : '${e}'.";
      print("Error : '${e}'.");
    }

    return res;
  }

  Future<String> printLines(List<String> lines) async {
    String res = '';
    try {
      Map<String, dynamic> config = Map();
      config['width'] = 40; // 标签宽度，单位mm
      config['height'] = 70; // 标签高度，单位mm
      config['gap'] = 0; // 标签间隔，单位mm

      // x、y坐标位置，单位dpi，1mm=8dpi
      List<LineText> list = [];
      int y=10;
      for(String line in lines){
        print(line);
        list.add(LineText(type: LineText.TYPE_TEXT, content: line+'\n\r', x: 10, y: y));
        y+=30;
      }
      
      await bluetoothPrint.printLabel(config, list);
    } catch (e) {
      res = "Error : '${e}'.";
      print("Error : '${e}'.");
    }

    return res;
  }
}
