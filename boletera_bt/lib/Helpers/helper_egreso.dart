import 'package:boletera_bt/Models/reporteitem.dart';
import 'package:sqflite/sqflite.dart';
import 'package:path/path.dart' as p;

class EgresosProvider {
  late Database db;

  init() async {
    var databasesPath = await getDatabasesPath();
    String path = p.join(databasesPath, 'boletera.db');
    print(path);
    db = await open(path);
    print('db');
    print(db);
  }

  Future<Database> open(String path) async {
    var this_db = await openDatabase(path, version: 1,
        onCreate: (Database database, int version) async {
      print('creating db...');
      return database.execute('''
        create table egresos (
          id integer primary key autoincrement,
          tipo integer,
          descripcion text,
          pathImage text,
          valor real
        )      
      ''');
    });

    return this_db;
  }

  Future<ItemReporte> insert(ItemReporte item) async {
    await init();
    print(item.toJson());
    item.id = await db.insert('egresos', item.toJson());
    await close();
    return item;
  }

  Future<ItemReporte?> get(int id) async {
    await init();
    List<Map> maps = await db.query('egresos',
        columns: ['id', 'tipo', 'descripcion', 'pathImage', 'valor'],
        where: 'id = ?',
        whereArgs: [id]);
    await close();
    return maps.isNotEmpty ? ItemReporte.fromJson(maps.first) : null;
  }

  Future<int> delete(int id) async {
    await init();
    print('borrando ' + id.toString());
    var res = await db.delete('egresos', where: 'id = ?', whereArgs: [id]);
    await close();
    return res;
  }

  Future<int> update(ItemReporte item) async {
    await init();
    var res = await db.update('egresos', item.toJson(),
        where: 'id = ?', whereArgs: [item.id]);
    await close();
    return res;
  }

  Future<List<ItemReporte>> egresos() async {
    await init();
    List<Map> maps = await db.query('egresos');
    List<ItemReporte> reportes = [];
    for (var i in maps) {
      reportes.add(ItemReporte.fromJson(i));
      print(i);
    }
    await close();
    return reportes;
  }

  Future close() async => db.close();
}
