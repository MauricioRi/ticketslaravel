class Configuracion {
  List<double> position = [0, 0];
  int frecuency = 15;
  bool working = false;

  Configuracion({required this.position, required this.frecuency, required this.working});

  Configuracion.fromJson(Map<String, dynamic> json) {
    position = json['position'].cast<double>();
    frecuency = json['frecuency'];
    working = json['working'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['position'] = position;
    data['frecuency'] = frecuency;
    data['working'] = working;
    return data;
  }
}
