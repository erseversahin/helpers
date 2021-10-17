const user = {
    name: "Şahin",
    surname: "ERSEVER",
    language : {
        php : "PHP",
        js : "Javascript",
    },
    phones: {
        gsm:{
            tel1 : "0555-555-5555",
            tel2 : "0532-532-5555"
        }
    }
}

const ObjectValueWithKeyPath = (object, path) => {
    const pathArray = Array.isArray(path) ? path : path.split(".");
    const lastIndex = pathArray.length - 1;
    return lastIndex > 0
        ? ObjectValueWithKeyPath(object, pathArray.slice(0, lastIndex))[pathArray[lastIndex]]
        : object[pathArray[0]];
}

console.log(ObjectValueWithKeyPath(user, ["name"]));
console.log(ObjectValueWithKeyPath(user, ["surname"]));
console.log(ObjectValueWithKeyPath(user, ["language", "php"]));
console.log(ObjectValueWithKeyPath(user, "phones.gsm.tel1"));

/*
Console Log
Şahin
ERSEVER
PHP
0555-555-5555
*/