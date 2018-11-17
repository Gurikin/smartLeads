/**
 *
 * @param asc - sorting direction
 * @param type - type of data in column - sorting index
 * @returns {*}
 */
function getCompare (asc, type) {
    // определить функцию сравнения, в зависимости от типа
    var compare;

    switch (type) {
        case 'integer':
            compare = function (a,b){
                if (asc == true) {
                    return a.integer - b.integer;
                } else {
                    return b.integer - a.integer;
                }
            };
            break;
        case 'date':
            compare = function (a,b) {
                var sD = sortDirection(asc);
                var aArr = a.date.match(/\d+/g);
                var bArr = b.date.match(/\d+/g);
                var aStr = aArr[2]+'-'+aArr[1]+'-'+aArr[0];
                var bStr = bArr[2]+'-'+bArr[1]+'-'+bArr[0];
                if(Date.parse(aStr) < Date.parse(bStr)) { return -sD; }
                if(Date.parse(aStr) > Date.parse(bStr)) { return sD; }
                return 0;
            }
            break;
        case 'text':
            compare = function (a,b) {
                var sD = sortDirection(asc);
                if(a.text < b.text) { return -sD; }
                if(a.text > b.text) { return sD; }
                return 0;
            };
            break;
        case 'decimal':
            compare = function (a, b) {
                var sD = sortDirection(asc);
                if(parseFloat(a.decimal) < parseFloat(b.decimal)) { return -sD; }
                if(parseFloat(a.decimal) > parseFloat(b.decimal)) { return sD; }
                return 0;
            }
            break;
    }
    return compare;
}

/**
 * function wrapper for get the sort direction
 * @param asc
 * @returns {number}
 */
function sortDirection(asc) {
    if (asc == true) {
        var sortDirection = 1;
    } else {
        var sortDirection = -1;
    }
    return sortDirection;
}