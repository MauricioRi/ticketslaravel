import 'package:latlong2/latlong.dart';

class GeoData {
  int id=0;
  String nombre='';
  double precio = 0;
  List<LatLng> puntos = [];
  LatLng centro = LatLng(0, 0);

  GeoData(this.id, this.nombre, this.puntos, this.centro, this.precio);
}