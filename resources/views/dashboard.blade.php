<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>


<script>

    function renderHtml(data) {
        return <div style="color: black;padding:5px 5px;">
            <div class="btn btn-danger rounded-circle btn-circle" style="float: left;margin-top:-10px !important;margin-left:-25px !important;margin-right:15px"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay text-white"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>

            <p>${data}
                <a href="" class="p-2 bg-red-400 rounded-lg" style="color:white;width:110px;margin-left:350px;margin-top:-32px">Mark as read </a>

            </p>
            <hr style="margin-left:-45px;width:530px" />
        </div>
    }

    $.get("http://localhost:8000/api/notify", function (data, status) {
        let html = ``;
        data.map(item => {
            html += renderHtml(item.data)
        })
        $('#notify').html(html)
    });
</script>
