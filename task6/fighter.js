class Fighter {
    constructor(name = 'undefined', power = 10, health = 100) {
        this.name = name;
        this.power = power <= 0 ? 5 : power;
        this.health = health <= 0 ? 100 : health;
    }

    setDamage(damage) {
        this.health -= damage;
        console.log(`${this.name} health: ${this.health}`);
    }

    hit(enemy, point) {
        let damage = point * this.power;
        console.log(`${this.name} hits ${enemy.name} for ${damage}`);
        enemy.setDamage(damage);
        if (0 >= enemy.health  ) {
            console.log(`${this.name} defeat ${enemy.name}`);
        }
    }
}

