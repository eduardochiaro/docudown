const categoriesSeed = require('./categories.js');
const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

const load = async () => {
  try {
    await categoriesSeed();
    
  } catch (e) {
    console.error(e);
    process.exit(1);
  } finally {
    await prisma.$disconnect();
  }
};

load();
