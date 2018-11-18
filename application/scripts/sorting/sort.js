/**
 * @param table_array - array to sort
 * @param type - type of data
 * @param asc_id - get from element id
 * @returns sorted array
 */
function sortTable(table_array, type, asc_id) {
    var asc = (/*asc_id == '' || asc_id == null || */asc_id == 'asc') ? true : false;
    var sortedTable = table_array.sort(getCompare(asc, type));
    return sortedTable;
}