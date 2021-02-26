//1 線條
//2 圓形

let ctx

var posList = []
var canvas = document.getElementById('canvas');
ctx = canvas.getContext('2d');
ctx.translate(215, 215);

const c_length = 115
const s_length = 160

const del_btn = $("<button>").attr("type", "button").attr("class", "btn btn-sm btn-outline-danger float-right").attr("onclick", "del(this)").text("刪除")

function line(x1, y1, x2, y2) {
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
}

function circle(x, y, scale) {
    ctx.beginPath();
    ctx.arc(x, y, c_length * scale, 0, 2 * Math.PI);
    ctx.stroke();
}

function square(x, y, scale, rot = 0) {
    ctx.beginPath();
    side = s_length * scale

    ctx.save();
    ctx.rotate(rot * Math.PI / 180);
    ctx.rect(x - (side / 2), y - (side / 2), side, side);
    ctx.restore();
    ctx.stroke();
}

//x y 各減215 就是腳本內實際座標 
function baseLine() {
    ctx.lineWidth = 1;
    ctx.strokeStyle = '#CFCFCF';

    line(200, -200, -200, 200)
    line(-200, -200, 200, 200)
    line(0, -200, 0, 200)
    line(-200, 0, 200, 0)

    ctx.beginPath();
    ctx.arc(0, 0, 50, 0, 2 * Math.PI);
    ctx.arc(0, 0, 100, 0, 2 * Math.PI);
    ctx.arc(0, 0, 150, 0, 2 * Math.PI);
    ctx.stroke();
}

function lineForm() {
    ctx.strokeStyle = '#000000';
    ctx.lineWidth = 3;
    let x1 = $("#start_x").val()
    let y1 = $("#start_y").val()
    let x2 = $("#end_x").val()
    let y2 = $("#end_y").val()
    pos = [1, x1, y1, x2, y2]

    posList.push(pos.join(','))
    var li = $("<li>").attr("class", "list-group-item").attr("data", pos.join(',')).text(`直線 start(${x1}, ${y1}), end(${x2}, ${y2})`).append(del_btn.clone())
    $("#items-list").append(li)

    line(x1, y1, x2, y2)

    $("#start_x").val("")
    $("#start_y").val("")
    $("#end_x").val("")
    $("#end_y").val("")
}


function circleForm() {
    ctx.strokeStyle = '#000000';
    ctx.lineWidth = 3;

    let x = $("#pos_x").val()
    let y = $("#pos_y").val()
    let scale = $("#scale").val()
    pos = [2, x, y, scale]

    circle(x, y, scale)
    posList.push(pos.join(','))
    var li = $("<li>").attr("class", "list-group-item").attr("data", pos.join(',')).text(`圓形 pos(${x}, ${y}), scale: ${scale}`).append(del_btn.clone())
    $("#items-list").append(li)

    $("#pos_x").val("")
    $("#pos_y").val("")
    $("#scale").val("")
}

function squareForm() {
    ctx.strokeStyle = '#000000';
    ctx.lineWidth = 3;

    let x = $("#pos_x2").val()
    let y = $("#pos_y2").val()
    let scale = $("#scale2").val()
    let rot = $("#rot").val()
    if (rot == "") rot = 0
    pos = [6, x, y, scale, rot]

    square(x, y, scale, rot)
    posList.push(pos.join(','))
    var li = $("<li>").attr("class", "list-group-item").attr("data", pos.join(',')).text(`正方形 pos(${x}, ${y}), scale: ${scale}, rot: ${rot}`).append(del_btn.clone())
    $("#items-list").append(li)

    $("#pos_x2").val("")
    $("#pos_y2").val("")
    $("#scale2").val("")
    $("#rot").val("")
}

function del(obj) {
    ele = $(obj).parent()
    index = ele.index()
    posList.splice(index, 1)
    ele.remove()

    redraw()
}

function redraw() {
    ctx.clearRect(-200, -200, canvas.width, canvas.height);

    baseLine()

    ctx.strokeStyle = '#000000';
    ctx.lineWidth = 3;
    posList.forEach(function(item, i) {
        pos = item.split(",")

        switch (pos[0]) {
            case '1':
                line(pos[1], pos[2], pos[3], pos[4])
                break
            case '2':
                circle(pos[1], pos[2], pos[3])
                break
            case '6':
                square(pos[1], pos[2], pos[3], pos[4])
                break
        }

    });

}

function lineOutput(x1, y1, x2, y2) {
    return `&lt;Effect ID=&quot;1&quot; StartX=&quot;${x1}&quot; StartY=&quot;${y1}&quot; EndX=&quot;${x2}&quot; EndY=&quot;${y2}&quot; /&gt;`
}

function circleOutput(x, y, scale) {
    return `&lt;Effect ID=&quot;2&quot; PosX=&quot;${x}&quot; PosY=&quot;${y}&quot; Rot=&quot;0&quot; Scale=&quot;${scale}&quot; Flip=&quot;false&quot; /&gt;`
}

function squareOutput(x, y, scale, rot) {
    return `&lt;Effect ID=&quot;6&quot; PosX=&quot;${x}&quot; PosY=&quot;${y}&quot; Rot=&quot;${rot}&quot; Scale=&quot;${scale}&quot; Flip=&quot;false&quot; /&gt;`
}

function output() {
    let lineEffect = []

    posList.forEach(function(item, i) {

        pos = item.split(",")

        switch (pos[0]) {
            case '1':
                res = lineOutput(pos[1], pos[2], pos[3], pos[4])
                break
            case '2':
                res = circleOutput(pos[1], pos[2], pos[3])
                break
            case '6':
                res = squareOutput(pos[1], pos[2], pos[3], pos[4])
                break
        }

        lineEffect.push(res)
    });

    lineEffect.unshift("&lt;Effects&gt;&#xD;&#xA;")
    lineEffect.push("&#xD;&#xA;&lt;/Effects&gt;")
    $("#output").text(lineEffect.join(''))

}

baseLine()