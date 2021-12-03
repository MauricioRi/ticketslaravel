class Egreso {
  int id = 0;
  String egreso = '';

  Egreso({required this.id, required this.egreso});

  Egreso.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    egreso = json['egreso'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['egreso'] = this.egreso;
    return data;
  }
}
