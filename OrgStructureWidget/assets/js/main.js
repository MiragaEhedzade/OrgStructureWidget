$(function(){
        org_chart = $('#orgChart').orgChart({
            data: organizations,
            showControls: true,
            allowEdit: true,
            onAddNode: function(node){  
                org_chart.newNode(node.data.id); 
            },
            onDeleteNode: function(node){ 
                org_chart.deleteNode(node.data.id); 
            },
            onClickNode: function(node){ 
            }

        });
    });