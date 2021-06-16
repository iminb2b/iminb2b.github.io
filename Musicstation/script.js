const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const members = $$('.member')
const infos = $$('.info')
members.forEach((element, index) => {
    const info = infos[index]
    element.onclick = function(){
        $('.member.active').classList.remove('active')
        $('.info.active').classList.remove('active')
        this.classList.add('active')
        info.classList.add('active')
    }
});

const playBtn = $('.fa-play-circle')
const pauseBtn = $('.fa-pause-circle')
const playNext = $('.fa-step-forward')
const playPrev = $('.fa-step-backward')
const playRandom = $('.fa-random')
const playAgain = $('.fa-redo-alt')
const progress = $('.progress')
const cdThumb = $('.cd-thumb')
const app = {
    currentIndex:0,
    isRandom: false,
    isRedo:false,
    songs: [
        {
            name: 'Beautiful Pain',
            singer: 'BTOB',
            path: './mp3/Beautiful-pain.mp3',
        
        },
        {
            name: 'Friend',
            singer: 'BTOB',
            path: './mp3/Friend.mp3',
        
        },
        {
            name: 'Like it',
            singer: 'BTOB',
            path: './mp3/Like-it.mp3',
        
        },
        {
            name: 'Butterfly',
            singer: 'BTOB',
            path: './mp3/Butterfly.mp3',
        
        },
        {
            name: 'Climax',
            singer: 'BTOB',
            path: './mp3/Climax.mp3',
        
        },
        {
            name: 'Beautiful Pain (Inst)',
            singer: 'BTOB',
            path: './mp3/Beautiful-pain-inst.mp3',
        
        },
    
    ],
    render: function(){
        const htmls = this.songs.map(song =>{
            return `
            <div class="song">${song.name} </div>
            `
        })
        $('.songs').innerHTML = htmls.join('\n')
    },
    handleEvents: function(){
        const cdthumb = cdThumb.animate([
            {
                transform:'rotate(360deg)'
            }
        ],{
            duration: 10000,
            iterations: Infinity
        }
        )
        cdthumb.pause()
        playBtn.onclick = function(){
            playBtn.classList.remove('show');
            pauseBtn.classList.add('show');
            audio.play()
            cdthumb.play()
        }
        pauseBtn.onclick = function(){
            pauseBtn.classList.remove('show');
            playBtn.classList.add('show');
            audio.pause()
            cdthumb.pause()
        }
        playNext.onclick = function(){
            if(app.isRandom){
                app.randomSong()
            }else{
                app.nextSong()

            }
            pauseBtn.onclick()
            playBtn.onclick()
            
        }
        playPrev.onclick = function(){
            if(app.isRandom){
                app.randomSong()
            }else{
                app.prevSong()

            }
            pauseBtn.onclick()
            playBtn.onclick()
            
        }
        playRandom.onclick = function(){
            app.isRandom=!app.isRandom
            playRandom.classList.toggle('show',app.isRandom)
        }
        audio.ontimeupdate= function(){
            progress.value = 0
            const prog = Math.floor(audio.currentTime / audio.duration * 100)
            progress.value = prog
        }
        progress.onchange= function(){
            const seekTime = audio.duration / 100 * progress.value
            audio.currentTime = seekTime
        }
        audio.onended = function(){
            if(app.isRedo){
                
                app.loadCurrentSong()
                audio.play()
            }else{
                app.currentIndex++
                if(app.currentIndex >= app.songs.length){
                    app.currentIndex = 0
                }
                app.loadCurrentSong()
                audio.play()
            }
            
        }
        playAgain.onclick= function(){
            app.isRedo=!app.isRedo
            playAgain.classList.toggle('show',app.isRedo)
        }
    },
    getCurrentSong: function(){
        const song = $$('.song')
        song.forEach((element, index)=>{
            if(index===this.currentIndex){
                element.classList.add('active')
            }else{
                element.classList.remove('active')
                
            }
        })
    },
    chooseSong: function(){
        const song = $$('.song')
        song.forEach((element, index)=>{
            element.onclick=function(){
                app.currentIndex= index
                app.loadCurrentSong()
                pauseBtn.onclick()
                playBtn.onclick()
            }
        })
    },
    randomSong:function(){
        let newIndex 
        
        do{
            newIndex = Math.floor(Math.random()*this.songs.length)


        }while(newIndex===this.currentIndex)
        this.currentIndex = newIndex;
        this.loadCurrentSong()
    },
    nextSong: function(){
        this.currentIndex++
        if(this.currentIndex >= this.songs.length){
            this.currentIndex = 0
        }
        this.loadCurrentSong()
    },
    prevSong: function(){
        this.currentIndex--
        if(this.currentIndex <= 0){
            this.currentIndex = this.songs.length-1
        }
        console.log(this.currentIndex)
        this.loadCurrentSong()
    },
    loadCurrentSong: function(){
        $('.song-name').innerHTML=this.currentSong.name
        const audio = $('#audio')
        audio.src=this.currentSong.path
        this.getCurrentSong()
    },
    defineProperties: function(){
        Object.defineProperty(this, 'currentSong',{
            get: function(){
                return this.songs[this.currentIndex]
            }
        })
    },
    start: function(){
        this.defineProperties()
        this.render()
        this.loadCurrentSong()
        this.getCurrentSong()
        this.handleEvents()
        this.chooseSong()
    },
}
app.start()
