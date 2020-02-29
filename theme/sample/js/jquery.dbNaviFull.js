;(function($){
	$.fn.dbNaviFull=function(options){
		//옵션값
		var opt={
			pageNum:null,           //메인메뉴 페이지인식
			subNum:null,            //서브메뉴 페이지인식
			subState:false,         //메뉴활성시 서브메뉴의 오픈유무(true,false)
			motionType:'slide',     //모션타입(none,fade,slide)
			motionSpeed:300,        //모션속도(밀리초)
			delayTime:0             //메뉴아웃시 되돌아가는 딜레이시간(밀리초)

		}	
		$.extend(opt,options);
		return this.each(function(){
			var $this=$(this);			
			var $main=$this.find('.main');
			var $mainList=$main.find('li');
			var $mask=$this.find('.mask');
			var $subSet=$mask.find('.subSet ul');
			var $subList=$subSet.find('li');
			var listNum=$mainList.length;
			var fixMenu=opt.pageNum-1;
			var fixSub=opt.subNum-1;
			var currentMenu=fixMenu;
			var currentSub=fixSub;
			var timerId;
			var mOver=opt.subState;
			init();	

			function init(){
				setMouseEvent();
				setAnimation();				
			}

			function setMouseEvent(){
				$this.bind('mouseenter',function(){
					mOver=true
					clearTimeout(timerId);
				});
				$this.bind('mouseleave',function(){
					mOver=false;
					timerId=setTimeout(setAnimation,opt.delayTime);
				});
				
				$mainList.bind('mouseenter keyup',function(){	
					mOver=true
					currentMenu=$(this).index();
					
					if(currentMenu!=fixMenu){
						currentSub=null;
					}						
					setAnimation();

				});
				
				$mainList.bind('mouseleave',function(){
					if(currentMenu!=fixMenu){
						currentSub=fixSub;
					}
					currentMenu=fixMenu;						
				});

				$subList.bind('mouseenter keyup',function(){
					currentMenu=$(this).parent('ul').index();
					currentSub=$(this).index();	
					setAnimation();
				});
				$subList.bind('mouseleave',function(){
					currentMenu=fixMenu
					var _currentMenu=$(this).parents('ul').index();	
					if(_currentMenu==fixMenu){
						currentSub=fixSub;
					}else{
						currentSub=null;
					}						
				});
				
			}

			function setAnimation(){
				if(mOver||opt.subState){
						switch(opt.motionType){
							case 'fade':
								$mask.stop(true,true).fadeIn(opt.motionSpeed);
								break;
							case 'slide':
								$mask.stop(true,true).slideDown(opt.motionSpeed);
								break;
							default:
								$mask.show();
						}	
						
				}else{
						switch(opt.motionType){
							case 'fade':
								$mask.stop(true,true).fadeOut(opt.motionSpeed/2);
								break;
							case 'slide':
								$mask.stop(true,true).slideUp(opt.motionSpeed/2);
								break;
							default:								
								$mask.hide();
						}
				}
				
				/*
				for(var i=0;i<listNum;i++){
					var _mainList=$mainList.eq(i);
					
					if(currentMenu==i){						
						_mainList.addClass('main_select');
						setReplace(_mainList.find('>a>img'),'src','_off','_on');
					}else{						
						_mainList.removeClass('main_select');						
						setReplace(_mainList.find('a>img'),'src','_on','_off');
											
					}
					var _subSet=$subSet.eq(i);
					for(var k=0;k<_subSet.find('li').length;k++){
						var _subList=_subSet.find('li').eq(k);
						if(currentSub==k&&currentMenu==i){
							setReplace(_subList.find('a>img'),'src','_off','_on');
							_subList.addClass('sub_select');
						}else{
							if(i!==fixMenu||k!=fixSub){
							_subList.removeClass('sub_select');
							setReplace(_subList.find('a>img'),'src','_on','_off');
							}
						}
					}						
				}
				*/
			}
			/*
			function setReplace(_mc,_attr,_old,_new){
				var str=_mc.attr(_attr);
				if(String(str).search(_old)!=-1){
					_mc.attr(_attr,str.replace(_old,_new));
				}
			}
			*/
		})
	}
})(jQuery)
