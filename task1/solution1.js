/**
 * Inheritance with construct functions
 */

/**
 *
 * @param name
 * @param age
 * @param sound
 * @param region
 * @returns {Animal}
 * @constructor
 */
var Animal = function (name, age, sound, region) {
    this.name = name;
    this.age = age;
    this.sound = sound;
    this.region = region;
    this.say = function () {
        console.log('name: ' + this.name +' sound: ' + this.sound + ' age: ' + this.age + ' region: ' + this.region);
    };
    return this;
};

/**
 *
 * @param name
 * @param age
 * @param sound
 * @param region
 * @returns {Cat}
 * @constructor
 */
var Cat = function (name, age, sound, region) {
    Animal.prototype.constructor.apply(this, arguments);
    this.goAway = function () {
        return this.name + ' go away';
    };
    return this;
};

/**
 *
 * @param name
 * @param age
 * @param sound
 * @param region
 * @returns {Dog}
 * @constructor
 */
var Dog = function (name, age, sound, region) {
    Animal.prototype.constructor.apply(this, arguments);
    this.goAway = function () {
        return this.name + ' go away';
    };
    return this;
};

/**
 *
 * @param name
 * @param age
 * @param sound
 * @param region
 * @returns {Woodpecker}
 * @constructor
 */
var Woodpecker = function (name, age, sound, region) {
    Animal.prototype.constructor.apply(this, arguments);
    this.goAway = function () {
        return this.name + ' go away';
    };
    return this;
};

var dog = new Dog('dog', 4, 'zoo', 'ua');
var cat = new Cat('cat', 2, 'buu', 'ua');
var woodpecker = new Woodpecker(4, 'woodpecker ', 4, 'zzz', 'ua');

dog.say();
cat.say();
woodpecker();