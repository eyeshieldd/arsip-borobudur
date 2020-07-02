<script>
    jQuery(document).ready(function() {
        /* Set DataTable */
        dtpost = $("#tpost").DataTable({
            "ajax": {
                "url": "<?= site_url('post/get_list_post'); ?>",
                "type": "POST"
            },
            "serverSide": false,
            "bFilter": true,
            "paging": true,
            "columns": [{
                    "data": "post_title"
                },
                {
                    "data": "channel_name"
                },
                {
                    "data": "post_status"
                },
                {
                    "data": "aksi",
                    "className": "text-center"
                }
            ]
        });
    })
</script>