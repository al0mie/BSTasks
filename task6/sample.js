window.onload = function() {
    let fighter = new Fighter('Fighter', 5, 100);
    let improvedFighter = new ImprovedFighter('Improved fighter', 5, 100);
    fight(fighter, improvedFighter, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10);
};

function fight(fighter1, fighter2, ...points) {
    while(true) {
        let point = points[0];
        fighter1.hit(fighter2, point);
        if (fighter2.health <= 0)  {
            console.log(`${fighter1.name} is a winner`);
            break;
        } else if (!points.length) {
            console.log('Not winner. Try again');
            console.log(`${fighter1.name}:  ${fighter1.health}`);
            console.log(`${fighter2.name}:  ${fighter2.health}`);
        }
        points.shift();
        [fighter1, fighter2] = [fighter2, fighter1];
    }
}

