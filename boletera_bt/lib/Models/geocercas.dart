class Geocerca {
  int id=0;
  String nombre='';
  String datos='';
  int empresa=0;
  String createdAt='';
  String updatedAt='';
  double amount = 0;

  Geocerca(
      {required this.id,
      required this.nombre,
      required this.datos,
      required this.empresa,
      required this.createdAt,
      required this.updatedAt,
      required this.amount});

  Geocerca.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    nombre = json['nombre'];
    datos = json['datos'];
    empresa = json['empresa'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    amount = double.parse(json['amount']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['nombre'] = this.nombre;
    data['datos'] = this.datos;
    data['empresa'] = this.empresa;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    return data;
  }
}
