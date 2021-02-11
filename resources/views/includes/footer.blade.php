<footer>
    <div class="links">
        <ul class="footer__category links__categories">
            <li class="title">
                <h4>Categories</h4>
            </li>
            @foreach($categories as $category)
                <li>
                    <a>{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
        <ul class="footer__category links__social">
            <li class="title">
                <h4>Social</h4>
            </li>
            <li>
                <a href="facebook.com">Facebook</a>
            </li>
            <li>
                <a href="instragram.com">Instagram</a>
            </li>
            <li>
                <a href="twitter.com">Twitter</a>
            </li>
        </ul>
        <div class="footer__category links__contact">
            <div class="title">
                <h4>Contact</h4>
            </div>
            <div>
               <form>
                    <div class="form__group">
                        <input type="text" name="name" placeholder="Your name..."/>
                    </div>
                    <div class="form__group">
                        <input type="text" name="email" placeholder="Your email address"/>
                    </div>
                    <div class="form__group">
                        <textarea placeholder="Your message for us..."></textarea>
                    </div>  
                    
                    <div class="form__group form__group--right-aligned">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    
               </form>
            </div>
        </div>
        <div class="footer__category links__newsletter">
            <div class="title">
                <h4>Newsletter</h4>
            </div>
            <form>
                <div class="form__group">
                    <input type="text" name="email" placeholder="Your email address..."/>
                </div>
                <div class="form__group form__group--right-aligned">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </div>
                
            </form>
        </div>
    </div>
    <div class="copyright">
        Coypirght @ 2021
    </div>
</footer>