caIterator = 0;

function add_row(){
    var table = document.getElementById("maintable");
    var row = document.createElement("tr");
    var key = document.createElement("td");
    var val = document.createElement("td");
    var ops = document.createElement("td");

    var key_input = document.createElement("input");
    val_input.id = "key_" + caIterator;
    var val_input = document.createElement("input");
    val_input.id = "val_" + caIterator;
    var ops_input = document.createElement("button");
    ops_input = del_parent;
    ops_input.id = "del_" + caIterator++;
    ops_input.value = false;
    var ops_text = document.createTextNode(" Delete ")

    key.appendChild(key_input);
    val.appendChild(val_input);
    ops.appendChild(ops_input);
    ops.appendChild(ops_text);

    row.appendChild(key);
    row.appendChild(val);
    row.appendChild(ops);

    table.appendChild(row);
}

function del_parent(){
    this.parentElement.parentElement.remove();
}

function set_vals(){

}