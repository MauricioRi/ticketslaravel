class Precios {
  int id=0;
  int idRoutes=0;
  int idOrigin=0;
  int idDestination=0;
  String amount='';
  String createdAt='';
  String modificationDate='';
  String userCreate='';
  String userUpdate='';

  Precios(
      {required this.id,
      required this.idRoutes,
      required this.idOrigin,
      required this.idDestination,
      required this.amount,
      required this.createdAt,
      required this.modificationDate,
      required this.userCreate,
      required this.userUpdate});

  Precios.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    idRoutes = json['id_routes'];
    idOrigin = json['id_origin'];
    idDestination = json['id_destination'];
    amount = json['amount'];
    createdAt = json['created_at'];
    modificationDate = json['modification_date'];
    
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['id_routes'] = this.idRoutes;
    data['id_origin'] = this.idOrigin;
    data['id_destination'] = this.idDestination;
    data['amount'] = this.amount;
    data['created_at'] = this.createdAt;
    data['modification_date'] = this.modificationDate;
    data['user_create'] = this.userCreate;
    data['user_update'] = this.userUpdate;
    return data;
  }
}
