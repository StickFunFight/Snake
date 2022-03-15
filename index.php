<style>
    canvas {
        padding-left     : 0;
        padding-right    : 0;
        margin-left      : auto;
        margin-right     : auto;
        display          : block;
        background-image : url("Images/Background.png");
    }
</style>
<html>
    <body style="background-color: rgba(10,231,128,0.3)">
        <canvas id="SnakeVeld" style="border-style: solid;border-width: 5px;   margin: auto;
  width: 50%;" width="420" height="320">
        </canvas>

        <script>
            window.onload = function() {
                const Apple   = new Image();
                const Slang   = new Image();
                const Lichaam = new Image();
                const Staart  = new Image();

                const Chomp = new Audio('Sounds/Chomp.mp3');

                const Death = new Audio('Sounds/death.mp3');

                const AchtergrondMuziekje = new Audio('Sounds/Brodyquest.mp3');

                Apple.src   = 'Images/Apple.png';
                Slang.src   = 'Images/SnakeRechts.png';
                Lichaam.src = 'Images/LichaamHorizonTaal.png';
                Staart.src  = 'Images/StaartRechts.png';

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

                setInterval(teken, 30);
                setInterval(beweeg, 130);
                setInterval(spawnRoodDing, 50);

                function teken() {
                    ctx.clearRect(0, 0, WIDTH, HEIGHT);


                    ctx.beginPath();
                    ctx.fillStyle = ctx.createPattern(Slang, 'repeat');

                    ctx.fillRect(x, y, 20, 20);
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = ctx.createPattern(Lichaam, 'repeat');

                    ctx.fillRect(x - 20, y, 20, 20);
                    ctx.closePath();


                    ctx.beginPath();
                    ctx.fillStyle = ctx.createPattern(Staart, 'repeat');

                    ctx.fillRect(x - 40, y, 20, 20);
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
                        Death.play();
                    }
                }

                document.addEventListener('keydown', function(e) {
                    AchtergrondMuziekje.play();
                    AchtergrondMuziekje.volume = 0.1;
                    if (Richting !== 'Onder') {
                        if (e.key === 'w') {
                            Richting  = 'Boven';
                            Slang.src = 'Images/SnakeUp.png';
                        }
                    }
                    if (Richting !== 'Boven') {
                        if (e.key === 's') {
                            Richting  = 'Onder';
                            Slang.src = 'Images/SnakeDown.png';
                        }
                    }
                    if (Richting !== 'Rechts') {
                        if (e.key === 'a') {
                            Richting  = 'Links';
                            Slang.src = 'Images/SnakeLinks.png';
                        }
                    }
                    if (Richting !== 'Links') {
                        if (e.key === 'd') {
                            Richting  = 'Rechts';
                            Slang.src = 'Images/SnakeRechts.png';
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
                    lengteSlangetje ++;
                    Chomp.play();
                    spawnRoodDing();
                    console.log(lengteSlangetje);
                }
            };
        </script>
    </body>
</html>