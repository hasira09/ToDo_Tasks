import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:todo_tasks/Screens/HomeScreen.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    SystemChrome.setSystemUIOverlayStyle(const SystemUiOverlayStyle(statusBarColor: Colors.transparent));
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'ToDo Tasks App',
      home: HomeScreen(),
    );
  }
}
