class ToDo {
  String? id;
  String? todoText;
  late bool isDone;

  ToDo({
    required this.id,
    required this.todoText,
    this.isDone = false,
});

  static List<ToDo> todoList() {
    return[
      ToDo(id: '01', todoText: 'Morning Cleanup', isDone: true),
      ToDo(id: '02', todoText: 'Breakfast', isDone: true),
      ToDo(id: '03', todoText: 'Coding Activities',),
      ToDo(id: '04', todoText: 'Lunch',),
      ToDo(id: '05', todoText: 'Short Notes',),
      ToDo(id: '06', todoText: 'Evening Tea',),

    ];
  }

}