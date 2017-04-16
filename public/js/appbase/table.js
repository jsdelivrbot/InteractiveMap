var TableMain = function(string){
	this.domObj = {
		main:$('#'+string), //table DOM
		card:$('#cardbuild'),
		// counter: $('#showCount'),
		count: $('#showCount').val(),
		showText:$('#showText'),
		currentPage: 1
	}
	this.buildObjs;
	this.tableBuild=[];

}

TableMain.prototype.supply = function(obj) {
	if(typeof obj == "string"){
		return;
	} else if(obj.length > 0){

	}
	this.buildObjs = obj;

	var rowReq = ['name','description']

	handler = {
		buildCard: function(id,s_Obj){
			var c = "<div class='msc col-sm-3' id="
			+id+"><div class='box box-primary'><div class='box-header with-border'>"
			+ "<img class='img-header' src='buildings/"
			+ s_Obj.image+".jpg' style='max-height: 120px; min-height: 60px;'></div>"  //image name here    
            + "<div class='box-body'><p><strong class='text-info'>"
            +s_Obj.name + "</strong></p><strong>Description: </strong>"
            + "<p class='text-muted desc'>"
            + s_Obj.description + "</p></div></div></div>"
            return c
		},
		buildRow: function(id,s_Obj){
			var c = "<td>"+id+"</td>"
			a = {
				name:function(n){
					return '<a class="msc">'+n+'</a>'
				},description:function(d){
					return '<p class="desc">'+d+'</p>'
				}
			}
			$(rowReq).each(function(ind,val){
				c+="<td>" + a[val](s_Obj[val]) +"</td>"
			})
			return c
		},noItem: function(){

		}
	}
	var arr = []
	var tr
	var crd
	$(obj).each(function(ind,val){
		var z = handler.buildRow(ind+1,obj[ind])
		crd = crd==undefined ? handler.buildCard(ind+1,obj[ind]) : crd+handler.buildCard(ind+1,obj[ind])
		arr.push(z)
		tr += '<tr>'+z+'</tr>'
	})

	this.tableBuild = arr;
	// console.log(crd)
	this.domObj.card.html(crd)
	this.domObj.main.children('tbody').append(tr);
}