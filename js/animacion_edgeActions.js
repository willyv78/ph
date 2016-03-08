
(function($,Edge,compId){
	var Composition=Edge.Composition,Symbol=Edge.Symbol;
	//Edge symbol: 'stage'
	(function(symbolName){
		Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",21000,function(sym,e){sym.playReverse();});
		//Edge binding end
		Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",0,function(sym,e){sym.play();});
		//Edge binding end
	})("stage");
//Edge symbol end:'stage'
})(jQuery,AdobeEdge,"introph");