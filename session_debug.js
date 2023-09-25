var caIterator = 0



function add_row(){
    var table = document.getElementById("maintable");
    var row = document.createElement("tr");
    var key = document.createElement("td");
    var val = document.createElement("td");
    var ops = document.createElement("td");

    var key_input = document.createElement("input");
    key_input.name = "key_customadded_" + ++caIterator;
    var val_input = document.createElement("input");
    val_input.name = "val_customadded_" + caIterator;
    var ops_input = document.createElement("input");
    ops_input.type = "checkbox";
    ops_input.name = "del_customadded_" + caIterator;
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

    console.log(table);
}

function add_rows(){
    numrows = document.getElementById("numRowsToAdd").value;
    numrows ??= 0
    if(numrows<0){
        numrows=0;
    }
    for(let i=0;i<numrows;i++)
    {
        add_row();
    }
}