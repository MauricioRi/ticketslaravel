class Rutas {
  int id=0;
  String nameRoute='';
  String description='';

  Rutas({required this.id, required this.nameRoute, required this.description});

  Rutas.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    nameRoute = json['Name_route'];
    description = json['description'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['Name_route'] = this.nameRoute;
    data['description'] = this.description;
    return data;
  }
}