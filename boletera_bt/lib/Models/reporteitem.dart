class ItemReporte {
  int? id;
  int tipo = 0;
  String descripcion = '';
  String pathImage = '';
  double valor = 0;

  ItemReporte(this.tipo, this.descripcion, this.valor);

  ItemReporte.fromJson(Map<dynamic, dynamic> json) {
    id = json['id'];
    tipo = json['tipo'];
    descripcion = json['descripcion'];
    pathImage = json['pathImage'];
    valor = json['valor'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['tipo'] = this.tipo;
    data['descripcion'] = this.descripcion;
    data['pathImage'] = this.pathImage;
    data['valor'] = this.valor;
    return data;
  }
}
