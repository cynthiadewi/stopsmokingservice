<!--
    How to Stop Smoking view
    @author Cynthia Dewi 
    @version 06/08/2018
    @content from NHS smokefree booklet https://www.nelft.nhs.uk/download.cfm?doc=docm93jijm4n2709.pdf&ver=4431
 -->

@extends('layout.master')
@section('styles')
<style>
.stepsindent{
    padding-left:5%;
    padding-right:5%;
}
</style>
@endsection
@section('content')
    <div class="contentall">
        <div class="container-fluid">
            <!--img from https://www.nth.nhs.uk/services/stop-smoking-service/ -->
        <img id="sssteam" src="{{ asset('images/sssbanner1.jpg') }}" alt="Stop Smoking Service Team" style="width:100%;">
        </div>
        <div class="container">
        <span>
            <br/><h1>Well done you...</h1>
            reading this is your first step to quitting smoking for good.
            <br/>Join the thousands who've done it by taking these four steps:
            <br/><br/>
            <h3><a href='#think'>1. Think</a></h3>
            <h3><a href='#prepare'>2. Prepare</a></h3>
            <h3><a href='#quit'>3. Quit</a></h3>
            <h3><a href='#stop'>4. Stop for Good</a></h3>
            You've got nothing to lose but your habit.
            <br/><br/>

            <h3 id="think">1. Think about quitting</h3>
            Get ready to quit by starting to see yourself as a non smoker. Think how great you would feel if you stopped smoking for good, 
            and what it would be like to wake up every day feeling completely fresh and free, with more energy, more money, more life. 
            Follow these steps to make this happen. 
            <br/><br/>
            <div class="stepsindent">
            <h4>Think Positively</h4>
            Quitting's not easy, especially when it looks like so many people still smoke. But the truth is less than 17% of the population smoke, 
            with more quitting every day. While it's your choice and your journey, so many others benefit too. Like your family. You'll be able to spend more 
            quality time with them, and be around longer to see your kids grow up and have children of their own. You might have lost someone to smoking, 
            and want to be sure this is the last time it happens in your family. Thinking about others when you decide to quit can give you extra stregth to see it 
            through, and they ca all share in your success. <b>Remember you're not alone when you quit.</b>
            <br/><br/>

            <h4>Think about your health</h4>
            Quitting dramatically increases your chances of living a longer life. It takes just 20 minutes for your body to start healing once you quit smoking, 
            repairing the damage done by all those years smoking.
            <!--img from: https://myquit.ca/learn/-->
            <img id="sssteam" src="{{ asset('images/healing.jpg') }}" alt="Chart of body recovery" style="width:100%;">
            <br/><br/>
            </div>


            <h3 id="prepare">2. Prepare for a better future</h3>
            Preparing to quit is about being practical. It’s not just a test of your willpower. It’s about having a plan, understanding why you 
            smoke, finding an option that’s best for you, having people support you and setting a date to quit smoking.
            <br/><br/>
            <div class="stepsindent">
            <h4>Prepare a good plan</h4>
            It helps to set a date to quit smoking and be ready for it:
            <ul><li>Contact your local NHS Stop Smoking Service, where trained advisers are waiting to help you</li>
            <li>Identify your smoking triggers and plan ahead </li>
            <li>Take it one day at a time and feel good about what you’re doing </li>
            <li>Buddy up with a friend so you can support each other </li>
            <li>Use stop smoking medicines to cope with the withdrawal symptoms </li>
            <li>Avoid situations where you might be tempted to smoke again </li>
            <li>Note how much cash you’re saving – plan to treat yourself </li>
            </ul>
            And remember to tell yourself: “I can do it, I can do it, I can do it.""
            </div>
            <br/><br/>

            
            <h3 id="quit">3. Quit with the support that’s right for you</h3>
            Many smokers want to quit smoking but aren’t sure where to turn. Professional help can double your chances of success.
            <br/>There are many ways to quit and we can help you find the support that’s right for you: 
            <ul><li>with your local NHS Stop Smoking Service </li>
            <li>with on-the-go support from NHS Smokefree </li>
            <li>with stop smoking medicines (such as Nicotine Replacement Therapy or medication)</li>
            </ul>
            Speak to your pharmacy team, doctor or local NHS Stop Smoking Service to help you decide which is right for you 
            <br/>Local NHS Stop Smoking Services are completely free of charge*
            <br/>*If you usually pay for prescriptions there may be a charge for any stop smoking medication prescribed by NHS professionals.
            <br/><br/>
            <div class="stepsindent">
            <h4>Quit with your local NHS Stop Smoking Service</h4>
            Your local NHS Stop Smoking Service will give you all the support you need when you’re ready to quit. It’s staffed with expert NHS professionals 
            who’ll help you understand why you smoke and create a plan to help you quit. 
            With help from your local NHS Stop Smoking Service you’re up to four times more likely to quit than if you choose to go it alone.
            <br/><br/>
            <b>The right support for you</b>
            <br/>
            We will get you working with a trained adviser, either one-to-one or in a group – it’s up to you. You’ll be encouraged to set a date to 
            quit smoking and to attend sessions after that. Your adviser will also be able to check your level of addiction and advise you on the best 
            treatment to help you quit, including advising on different stop smoking medicines.
            <br/><br/>
            <b>Track your progress</b>
            <br/>
            A weekly carbon monoxide check can help you track your progress and let you see how your body recovers once you stop smoking.
            <br/><br/>
            
            <h4>Quit with Smokefree support</h4>
            Smokefree has lots of free support to help you quit for good, so you can find the support that’s right for you. 
            Choose from our smartphone app, Quit Kit, email programme or text messages that will help keep you focused wherever you are.
            <br/><br/>
            <b>App</b>
            <br/>
            If you have an iPhone or Android smartphone, there’s a free app for you to download to get support. Get practical and interactive support, 
            encouragement and advice on stopping smoking wherever you are. Find it in the iTunes app store or Google Play store.
            <br/><br/>
            <b>Quit Kit</b>
            <br/>
            Proven to increase your chances of quitting successfully, the Quit Kit gives you practical and engaging tools to help you step-by-step 
            in the comfort of your own home. Order yours from <a href ='http://nhs.uk/smokefree'>nhs.uk/smokefree</a>.
            <br/><br/>
            <b>Emails</b>
            <br/>Get emails sent straight to your inbox with relevant and useful tips for quitting, delivered every day for 1 month. 
            They are packed full of useful tips and helpful advice to support you in becoming smokefree. Go online to sign up at <a href ='http://nhs.uk/smokefree'>nhs.uk/smokefree</a>.
            <br/><br/>
            <b>Text support</b>
            <br/>
            Don’t worry if you don’t have a smartphone you can still get tips and support sent directly to your phone wherever you are. It’s proven 
            to double your chances of quitting successfully, and 71% of smokers who have used it say it helped them keep going. 
            Sign up at <a href ='http://nhs.uk/smokefree'>nhs.uk/smokefree</a> or text TIPS to 63818
            <br/><br/>
            
            <h4>Quit with a little help from stop smoking medicines </h4>
            The first few weeks without smoking can be the hardest. This is when your body is fighting the physical addiction. 
            This passes, but you might find stop smoking medicines helpful to get you through these early stages. Once the physical cravings pass 
            you’ll find it much easier to stay the course.
            <br/><br/>
            <b>Increased success</b>
            <br/>
            Nicotine Replacement Therapy (NRT) gives your body the nicotine it craves without the toxic chemicals you get in cigarettes like cyanide or 
            carbon monoxide, so it doesn’t cause cancer. There are six types available: patches, gum, lozenges, microtabs, inhalator and nasal spray. All of them 
            are available on prescription, or to buy over the counter. A full course of treatment usually lasts 10 – 12 weeks. It’s suitable for most adults, but if 
            you have a heart or circulatory condition, or are on regular medication, you should get the OK from your doctor. If you are pregnant, you should also 
            ask your doctor or midwife before using NRT.
            <br/><br/>
            <b>Try and try again</b>
            <br/>
            If one type doesn’t work at first, then try another or try a combination. Using patches with another NRT product can be very effective if you have 
            strong cravings. For the best results remember to check out the instructions, or talk to your pharmacist, local NHS Stop Smoking adviser or doctor 
            about how to use the various products.
            <br/><br/>
            NRT products:
            <ul><li>Patches</li>
            <li>Gum </li>
            <li>Lozenges </li>
            <li>Microtabs </li>
            <li>Nasal spray </li>
            <li>Inhalator</li>
            </ul>
            Quitting with the help of NRT products is about using the right product to fit with your lifestyle. There’s a ‘trick’ to how to use these products 
            effectively, so knowing a bit about the options can help you get it right. <b>Find the right method for YOU!</b>
            <br/><br/>
            
            <h4>Quit with the product that’s best for you</h4>
            <b>Need to just forget about smoking and the cravings through the day?</b>
            <br/>
            Patches get you through the day, without worrying about cravings. They come in 16 hour and 24 hour types, and constantly release small doses 
            of nicotine through the skin. They take a while to get going (30 minutes), so if you need a quicker hit to get you through you may need to look at other 
            products available.
            <br/><br/>
            <b>Need a day-long treatment you can regulate yourself?</b>
            <br/>
            Gum, microtabs and lozenges are all taken by mouth, and help you when you need them throughout the day. Gum is good for day-long treatment. Use about 
            10 – 15 fresh pieces through the day. For maximum effect, chew the gum slowly, then park it in the side of your mouth. 2mg or 4mg doses are available 
            to help beat the different strengths of craving. Microtabs contain nicotine and dissolve when you place them under your tongue. Lozenges slowly release 
            nicotine, and can take up to 30 minutes to dissolve.
            <br/><br/>
            <b>Need to beat the cravings NOW?</b>
            <br/>
            A Nasal spray or mouth spray might come in handy if you need a more instant dose of nicotine (such as first thing in the morning, or if you find 
            the slower release products take a bit too long at first). This delivers a swift and effective dose of nicotine through the lining of your nose.
            <br/><br/>
            <b>Need something to do with your hands?</b>
            <br/>
            An Inhalator releases nicotine vapour which gets absorbed through your mouth and throat. This might suit if you miss having something to do with your 
            hands when not smoking.
            <br/><br/>
            <b>Or do you want to consider alternatives to NRT?</b>
            <br/>
            As well as NRT, there are other products available on prescription that can help you quit smoking by changing the way your body responds to nicotine. 
            Champix (Varenicline) and Zyban (Bupropion Hydrochloride) work to reduce your cravings. They come in tablet form and you start taking them one or two 
            weeks before you quit. Treatment usually lasts 8 – 12 weeks. They are only available on prescription and are not available if you’re pregnant or under 18.
            <br/>
            To find out more about NRT and stop smoking medicines: Speak to your local NHS Stop Smoking adviser, or ask your local GP or pharmacist.
            </div>
            <br/><br/>

            
            <h3 id="stop">4. Stop for good by believing you can do it</h3>
            If you start again, don’t despair…it can take a few attempts to quit. There are lots of ways to quit smoking, and success comes from finding the 
            way that’s right for you. Local NHS Stop Smoking Services will always be there, and will be happy to help you again, they will also be able to give 
            advice on how to deal with your cravings. And because you’ve tried before, you can use that experience and try a different route.
            <br/>
            <br/>
        </span>
        </div>
    </div>
@endsection