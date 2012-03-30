<script type="text/javascript">
    function init() {

        scheduler.locale.labels.timeline_tab = "Timeline";
        scheduler.locale.labels.section_custom="Room";
        scheduler.config.details_on_create=true;
        scheduler.config.details_on_dblclick=true;
        scheduler.config.xml_date="%Y-%m-%d %H:%i";
		
		
        //===============
        //Configuration
        //===============	
		
        elements = [ // original hierarhical array to display
<?php
foreach ($listRooms as $roomId => $roomName) {
    echo '{key:' . $roomId . ', label:"Room ' . $roomName . '"},';
}
?>
        ];
        scheduler.createTimelineView({
            section_autoheight: false,
            name:	"timeline",
            x_unit:	"minute",
            x_date:	"%H:%i",
            x_step:	30,
            x_size: 24,
            x_start: 16,
            x_length:	48,
            y_unit: elements,
            y_property:	"section_id",
            render: "tree",
            folder_dy:20,
            dy:60
        });
        //===============
        //Data loading
        //===============
        scheduler.config.lightbox.sections=[	
            {name:"description", height:130, map_to:"text", type:"textarea" , focus:true},
            {name:"custom", height:23, type:"timeline", options:null , map_to:"section_id" }, //type should be the same as name of the tab
            {name:"time", height:72, type:"time", map_to:"auto"}
        ]
        scheduler.init('scheduler_here',new Date(),"timeline");
        scheduler.parse([
            <?php  ?>
            { start_date: "2009-06-30 09:00", end_date: "2009-06-30 12:00", text:"Task A-12458", section_id:20},
            { start_date: "2009-06-30 10:00", end_date: "2009-06-30 16:00", text:"Task A-89411", section_id:20},
            { start_date: "2009-06-30 10:00", end_date: "2009-06-30 14:00", text:"Task A-64168", section_id:20},
            { start_date: "2009-06-30 16:00", end_date: "2009-06-30 17:00", text:"Task A-46598", section_id:20},
            { start_date: "2009-06-30 12:00", end_date: "2009-06-30 20:00", text:"Task B-48865", section_id:40},
            { start_date: "2009-06-30 14:00", end_date: "2009-06-30 16:00", text:"Task B-44864", section_id:40},
            { start_date: "2009-06-30 16:30", end_date: "2009-06-30 18:00", text:"Task B-46558", section_id:40},
            { start_date: "2009-06-30 18:30", end_date: "2009-06-30 20:00", text:"Task B-45564", section_id:40},
            { start_date: "2009-06-30 08:00", end_date: "2009-06-30 12:00", text:"Task C-32421", section_id:50},
            { start_date: "2009-06-30 14:30", end_date: "2009-06-30 16:45", text:"Task C-14244", section_id:50},
            { start_date: "2009-06-30 09:20", end_date: "2009-06-30 12:20", text:"Task D-52688", section_id:60},
            { start_date: "2009-06-30 11:40", end_date: "2009-06-30 16:30", text:"Task D-46588", section_id:60},
            { start_date: "2009-06-30 12:00", end_date: "2009-06-30 18:00", text:"Task D-12458", section_id:60}
        ],"json");
    }
</script>
