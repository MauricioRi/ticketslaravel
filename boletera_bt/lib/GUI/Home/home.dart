import 'package:boletera_bt/GUI/Home/homebody.dart';
import 'package:boletera_bt/GUI/Home/menu.dart';
import 'package:boletera_bt/GUI/Home/printerscreen.dart';
import 'package:boletera_bt/GUI/Home/reportediario.dart';
import 'package:boletera_bt/Utils/items.dart';
import 'package:boletera_bt/Utils/sharedprefs.dart';
import 'package:bottom_bar/bottom_bar.dart';
import 'package:flutter/material.dart';

class HomeBoletera extends StatefulWidget {
  const HomeBoletera({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => _HomeBoleteraState();
}

class _HomeBoleteraState extends State<HomeBoletera>
    with SingleTickerProviderStateMixin {
  int actual = 1;
  int selectedScreen = 0;
  final _pageController = PageController();
  SPrefs prefs = SPrefs();
  bool workin = false;

  @override
  void initState() {
    load();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    //log('building');
    return WillPopScope(
      onWillPop: () async => null!,
      child: Scaffold(
          appBar: AppBar(
            title: const Text('Boletera'),
          ),
          body: PageView(
            controller: _pageController,
            children: const [HomeBody(), ReporteDiario(), Menu()],
            onPageChanged: (index) {
              setState(() => selectedScreen = index);
            },
          ),
          bottomNavigationBar: BottomBar(
              selectedIndex: selectedScreen,
              items: Items().navbarItems,
              onTap: (index) {
                print(index);
                _pageController.jumpToPage(index);
                setState(() => selectedScreen = index);
              })),
    );
  }

  void load() async {
    workin = await prefs.getBool('trabajando');
    setState(() {
      workin;
    });
  }
}
