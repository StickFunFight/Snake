<canvas id="SnakeVeld" style="border-style: solid;border-width: 5px;   margin: auto;
  width: 50%;" width="420" height="320">
</canvas>
<script>
    window.onload = function() {

        const Apple = new Image();
        const Slang = new Image();
        Apple.src = 'Apple..png';
        Slang.src = 'SnakeRechts.png';

        var x = 20;
        var y = 20;

        var WIDTH  = 200;
        var HEIGHT = 200;

        var Ytje;
        var Xtyje;
        var lengte = 20;

        var Richting;

        var RoodDingLocatie;

        var RoodDingGegeten = 0;

        var lengteSlangetje = 0;

        let snake = [{x: 200, y: 200}, {x: 190, y: 200}, {x: 180, y: 200}, {x: 170, y: 200}, {x: 160, y: 200}];


        let test = document.getElementById('SnakeVeld');
        HEIGHT   = test.height;
        WIDTH    = test.width;

        var ctx = test.getContext('2d');


        if (RoodDingGegeten = 0) {
            spawnRoodDing();
        }


        setInterval(teken, 50);
        setInterval(beweeg, 150);
        setInterval(spawnRoodDing, 50);

        function teken() {
            ctx.clearRect(0, 0, WIDTH, HEIGHT);


            ctx.beginPath();
            ctx.fillStyle = ctx.createPattern(Slang, 'repeat');

            ctx.fillRect(x, y, 20, 20);

            ctx.closePath();

            ctx.fillStyle = ctx.createPattern(Apple, 'repeat');
            // ctx.fillStyle = 'red';
            ctx.fillRect(RoodDingLocatie[1], RoodDingLocatie[0], 20, 20);

            if (x === Xtyje && y === Ytje) {
                RoodDingGegeten = 0;
                groeiLekker();
            }

            if (x > 420 || y > 300 || y < 0 || x < 0) {
                ctx.fillStyle = 'red';
                ctx.fillRect(0, 0, 420, 320);
                ctx.font      = '30px Comic Sans MS';
                ctx.fillStyle = 'black';
                ctx.textAlign = 'center';
                ctx.fillText('Game over', test.width / 2, test.height / 2);
                Richting = 'Niet';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (Richting !== 'Onder') {
                if (e.key === 'w') {
                    Richting = 'Boven';
                    Slang.src = 'SnakeUp.png';
                }
            }
            if (Richting !== 'Boven') {
                if (e.key === 's') {
                    Richting = 'Onder';
                    Slang.src = 'SnakeDown.png';
                }
            }
            if (Richting !== 'Rechts') {
                if (e.key === 'a') {
                    Richting = 'Links';
                    Slang.src = 'SnakeLinks.png';
                }
            }
            if (Richting !== 'Links') {
                if (e.key === 'd') {
                    Richting = 'Rechts';
                    Slang.src = 'SnakeRechts.png';
                }
            }
            if (e.key === 'Escape') {
                Richting = 'Niet';
            }
        });

        function beweeg() {
            if (Richting === 'Rechts') {
                x += 20;
            }
            if (Richting === 'Links') {
                x -= 20;
            }
            if (Richting === 'Onder') {
                y += 20;
            }
            if (Richting === 'Boven') {
                y -= 20;
            }
            if (Richting === 'Niet') {
            }
        }

        function spawnRoodDing() {
            if (RoodDingGegeten === 0) {
                HetYtjeZijnMax = Math.floor(Math.random() * 14);
                HetXtjeZijnMax = Math.floor(Math.random() * 19);

                Ytje  = Math.floor(HetYtjeZijnMax * 20);
                Xtyje = Math.floor(HetXtjeZijnMax * 20);

                RoodDingLocatie = [Ytje, Xtyje];
                RoodDingGegeten = 1;
            }
        }

        function groeiLekker() {
            lengteSlangetje++;
            spawnRoodDing();
            console.log(lengteSlangetje);
        }
    };
</script>