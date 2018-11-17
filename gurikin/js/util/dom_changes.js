/**
 *
 * @param tbody - node that need to change
 * @param srttbl - array - source to get content
 */
function replace_Tbody_from_arr (tbody, srttbl) {
    tbody.innerHTML = '';
    for (var i = 0; i < srttbl.length; i++) {
        var tr = document.createElement('tr');
        for (var key in srttbl[i]) {
            var td = document.createElement('td');
            td.innerText = srttbl[i][key];
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }
}

/**
 *
 * @param node - node that clicked
 * @param lastSortField - previous data type of sorting (for determining the direction of sorting)
 */
function changeId (node, lastSortField) {
    var currentSortField = node.getAttribute('data-type');
    var id = node.getAttribute('id');
    var thtr = node.parentElement.parentElement;
    if (currentSortField != lastSortField) {
        for (i=0; i<thtr.getElementsByTagName('TH').length; i++) {
            thtr.getElementsByTagName('TH')[i].setAttribute('id','');
        }
        node.setAttribute('id', 'asc');
        return;
    } else {
        if (id == '' || id == null || id == 'asc') {
            id = 'desc';
        } else {
            id = 'asc';
        }
        node.setAttribute('id',id);
        return;
    }
}