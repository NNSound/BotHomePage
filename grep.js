for (var i = 0; i < 18; i++) {
    // square(0, 0, 1.69, 3.6 * i)
    pos = [6, 0, 0, 1.69, 10 * i]
    posList.push(pos.join(','))
}
redraw()

for (var i = 0; i < 12; i++) {
    // square(0, 0, 1.69, 3.6 * i)
    var y = (50 * Math.cos(i * 30 * Math.PI / 180));
    var x = (50 * Math.sin(i * 30 * Math.PI / 180));
    pos = [2, x, y, 1.29]
    posList.push(pos.join(','))
}
redraw()