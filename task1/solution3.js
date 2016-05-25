/**
 *
 * @param animal
 * @returns type
 */
function getType(animal) {
    console.log('Animal: ', animal);
    if (Cat.prototype.isPrototypeOf(animal)) {
        return 'Cat';
    } else if (Dog.prototype.isPrototypeOf(animal)) {
        return 'Dog';
    } else if (Woodpecker.prototype.isPrototypeOf(animal)) {
        return 'Woodpecker';
    }
}

/**
 *
 * @returns type
 */
function getTypeUpdated() {
    console.log('Animal: ', this);
    if (Cat.prototype.isPrototypeOf(this)) {
        return 'Cat';
    } else if (Dog.prototype.isPrototypeOf(this)) {
        return 'Dog';
    } else if (Woodpecker.prototype.isPrototypeOf(this)) {
        return 'Woodpecker';
    }
}

console.log(getType(cat));
console.log(getType(dog));
console.log(getType(woodpecker));
console.log(getTypeUpdated.call(cat));
console.log(getTypeUpdated.call(dog));
console.log(getTypeUpdated.call(woodpecker));