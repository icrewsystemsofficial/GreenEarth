<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line('Seeding FAQs from FAQSeeder file...');

        $faq = new FAQ;
        $faq->title = 'How do I become climate neutral?';
        $faq->body = 'We all have an impact on the climate through our lifestyle; what we eat, how we travel, our housing etc, which cause greenhouse gas emissions. You can take responsibility for these emissions by offsetting so that the corresponding amount of greenhouse gases is not emitted elsewhere (or even get removed from the atmosphere), thus achieving a net zero effect for the climate.';
        $faq->created_by = "Kevin";
        $faq->status = '1';
        $faq->save();
        $this->command->info("Faq 1 created.");

        $faq = new FAQ;
        $faq->title = 'Does carbon offsetting work?';
        $faq->body = 'Yes! Since we all share the same atmosphere, a ton of carbon dioxide has the same impact no matter where it is emitted. When you choose to pay to offset your emissions, your money benefits the climate by contributing to a project that avoids greenhouse gas emissions in another part of the world. There are reliable ways to calculate the emissions so you can feel confident that the amount is correct, and the projects are controlled by external reviewers so that they really deliver the benefit they promised. In addition, you are contributing to the transition towards a sustainable society for those who cannot afford to make that kind of investment for themselves.';
        $faq->created_by = "John";
        $faq->status = '1';
        $faq->save();
        $this->command->info("Faq 2 created.");

        $faq = new FAQ;
        $faq->title = 'Can I buy a clean conscience with carbon offsetting?';
        $faq->body = 'No. Carbon offsetting is not a letter of indulgence. But since it is not possible to live a climate-neutral life in todays society, carbon offsetting is a way to immediately take responsibility for all of your climate impact. You help accelerate the global transition towards a sustainable society with your economic resources, and at the same time you can work on reducing your own emissions. Because climate change is such an acute problem, we must do everything we can to slow it down, and carbon offsetting is a very cost-effective way to do so.';
        $faq->created_by = "Lewis";
        $faq->status = '1';
        $faq->save();
        $this->command->info("Faq 3 created.");

        $faq = new FAQ;
        $faq->title = 'Who makes sure that the projects are serious and well executed?';
        $faq->body = 'Climate projects are certified by various organizations. They register projects that make climate benefit and measure how much benefit they actually do, so that they can sell exactly the right amount of credits. GoClimate purchases climate credits that are certified by Gold Standard, an organization founded by WWF and other environmental organizations, to ensure the highest possible quality of the climate projects. This also means that the projects are verified by a third-party, all documentation is public and we can track the project while it is being implemented and during its carbon credit period. Fundamental requirements for the projects, such as additionality, verifiability, traceability, permanence and contribution to sustainable development are guaranteed by the Gold Standard.';
        $faq->created_by = "Kevin";
        $faq->status = '1';
        $faq->save();
        $this->command->info("Faq 4 created.");

        $faq = new FAQ;
        $faq->title = 'How can carbon offsetting be so cheap?';
        $faq->body = 'If you think that carbon offsetting is cheap, it is probably because you belong to the richer part of the worlds population. Climate projects are relatively inexpensive for us, since we help those who cannot afford to invest in the better solutions available. In this way, we help to pick the low-hanging fruits in low-income countries, so that they have access to the same technology and development that we already have in the richest countries. Moreover, the entire project is usually not financed with carbon credits, but we are providing a part of the financing to make it financially feasible.';
        $faq->created_by = "John";
        $faq->status = '1';
        $faq->save();
        $this->command->info("Faq 5 created.");





    }
}
