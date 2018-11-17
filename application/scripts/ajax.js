function sendRequest(requestType, JSONreq, requestUrl) {
    var req = new XMLHttpRequest();
    req.open(requestType, requestUrl, true);
    req.send(JSONreq);
    return req;
}

function renderResponse(requestType, JSONreq, requestUrl) {
    var req = sendRequest(requestType, JSONreq, requestUrl);
    req.onreadystatechange = function () {
        if (req.readyState !== 4)
            return;
        if (req.status !== 200) {
            //handle of error
            alert(req.status + ': ' + req.statusText);
        } else {
            var response = document.getElementById("container body-content");
            response.innerHTML = req.responseText;
        }
    };
}

function sendAjaxForm_createTask() {
    $("#ajax-form").submit(function (event) {
        //Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page
        var $form = $(this),
                tskTitle = $form.find("input[name='taskTitle']").val(),
                bgnDate = $form.find("input[name='beginDate']").val(),
                eDate = $form.find("input[name='endDate']").val(),
                prgs = $form.find("input[name='progress']").val(),
                dscrn = $form.find("input[name='description']").val(),
                url = $form.attr("action");

        //Send hte data using post
        var posting = $.post(url, {
            taskTitle: tskTitle,
            beginDate: bgnDate,
            endDate: eDate,
            progress: prgs,
            description: dscrn
        });

        // Get the result
        posting.done(function (data) {
            $("#modalWindow-content").empty().append(data);
        });
        renderResponse('GET', '', '/task/selectTask');
    });
}

function sendAjaxForm_createUser() {
    $("#ajax-form").submit(function (event) {
        //Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page
        var $form = $(this),
                fName = $form.find("input[name='firstName']").val(),
                sName = $form.find("input[name='secondName']").val(),
                mName = $form.find("input[name='middleName']").val(),
                jTitle = $form.find("input[name='jobTitle']").val(),
                lgn = $form.find("input[name='login']").val(),
                pass = $form.find("input[name='password']").val(),
                phn = $form.find("input[name='phone']").val(),
                url = $form.attr("action");

        //Send hte data using post
        var posting = $.post(url, {
            firstName: fName,
            secondName: sName,
            middleName: mName,
            jobTitle: jTitle,
            login: lgn,
            password: pass,
            phone: phn,
        });

        // Get the result
        posting.done(function (data) {
            $("#modalWindow-content").empty().append(data);
        });
        renderResponse('GET', '', '/user/selectUser');
    });
}

function renderItemInfo(requestType, JSONreq, requestUrl) {
    var req = sendRequest(requestType, JSONreq, requestUrl);
    req.onreadystatechange = function () {
        if (req.readyState !== 4)
            return;
        if (req.status !== 200) {
            //handle of error
            alert(req.status + ': ' + req.statusText);
        } else {
            $("#modalWindow").fadeToggle(350);
            $("#modalWindow-content").html(req.responseText);
        }
    };
}

function userInfo() {
    this.firstName = '';
    this.secondName = '';
    this.middleName = '';
    this.jobTitle = '';
    this.phone = 0000;
    this.tasks = {
        'tastTitle': '',
        'orderDate': null,
        'endDate': null,
        'progress': 0
    };
}

function createChart() {
    $(document).ready(function () {
        var req = sendRequest('GET', '', '/chart/getUserEfficiencyChart');
        req.onreadystatechange = function () {
            if (req.readyState !== 4)
                return;
            if (req.status !== 200) {
                //handle of error
                alert(req.status + ': ' + req.statusText);
            } else {
                //      var response = document.getElementById("container body-content");
                //      response.innerHTML = req.responseText;              
                var us = JSON.parse(req.responseText);
                console.log(us);
                createPieChart("myChart", us.users, us.efficiency);
            }
        };
    });
}

function createPieChart(ctxElementId, labels, data) {
    var ctx = document.getElementById(ctxElementId);
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels,
            datasets: [{
                    label: '# of Votes',
                    data,
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                }]
        }
    });
}

function userEfficiency() {
    this.secondName = "";
    this.taskCount = 0;
}

