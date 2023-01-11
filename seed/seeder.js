const { PrismaClient } = require('@prisma/client');
const resetSeed = require('./reset.js');
const categoriesSeed = require('./categories.js');

const prisma = new PrismaClient();

const load = async () => {
  try {
    await resetSeed();
    await categoriesSeed();
    
  } catch (e) {
    console.error(e);
    process.exit(1);
  } finally {
    await prisma.$disconnect();
  }
};

load();
