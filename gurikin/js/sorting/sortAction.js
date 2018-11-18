    var lastSortField = '';
    document.onclick = function(e) {
        var grid = document.getElementById('t');
        var tbody = grid.getElementsByTagName('tbody')[0];
        var target = e.target;

        if (target.tagName != 'TH') {
            return;
        }
        // Если TH -- сортируем
        var currentSortField = target.getAttribute('data-type');
        // Парсим тело таблицы
        var tbl_arr = parseTable('t');
        // Меняем id на
        changeId(target, lastSortField);
        // Сортируем его
        var srttbl = sortTable(tbl_arr, currentSortField, target.getAttribute('id'));
        console.log("Sorted array for the "+currentSortField+" type :");
        console.log(srttbl);
        // Сохраняем столбец последней сортировки
        lastSortField = target.getAttribute('data-type');
        // Заменяем <tbody></tbody> в таблице
        replace_Tbody_from_arr(tbody, srttbl);
        grid.appendChild(tbody);
    };
