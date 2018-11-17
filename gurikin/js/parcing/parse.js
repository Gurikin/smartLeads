function parseTable(id) {
    var tbl_source = $('table#'+id+' tr:has(td)').map(function() {
        var $td =  $('td', this);
        return {
            integer: $td.eq(0).text(),
            date: $td.eq(1).text(),
            text: $td.eq(2).text(),
            decimal: $td.eq(3).text()
        }
    }).get();
    return tbl_source;
}
